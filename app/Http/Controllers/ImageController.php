<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Page;

class ImageController extends Controller
{
    public function show()
    {
        $pages = Page::withCount('products')->orderBy('title')->get();

        return view('images.index', ['pages' => $pages]);
    }

    public function folder(Page $page)
    {
        $images = Product::where('page_id', $page->id)->latest()->paginate(24);

        return view('images.folder', [
            'page' => $page,
            'images' => $images,
        ]);
    }

    public function create(?Page $page = null)
    {
        $pages = Page::orderBy('title')->get();

        return view('images.create', [
            'pages' => $pages,
            'selectedPage' => $page,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|',
        ]);

        foreach ($request->image as $image) {
            $imagePath = $image->store('page-content', 'local');

            $product = new Product();
            $product->page_id = $request->page_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = $imagePath;
            $product->save();
        }

        return redirect()->route('images.page', $request->page_id)->with('success', 'Images uploaded successfully.');
    }

    public function destroy(Product $product)
    {
        Storage::disk('local')->delete($product->image);

        $legacyImagePath = public_path($product->image);
        if (file_exists($legacyImagePath)) {
            unlink($legacyImagePath);
        }

        // Delete the product record from the database
        $product->delete();

        // Redirect back with a success message
        return redirect()->route('images.page', $product->page_id)->with('success', 'Image deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'selected_images' => 'required|array',
            'selected_images.*' => 'integer|exists:products,id',
            'page_id' => 'nullable|integer|exists:pages,id',
        ]);

        $images = Product::whereIn('id', $request->selected_images)->get();

        foreach ($images as $image) {
            Storage::disk('local')->delete($image->image);

            $legacyImagePath = public_path($image->image);
            if (file_exists($legacyImagePath)) {
                unlink($legacyImagePath);
            }
            // Delete the product record from the database
            $image->delete();
        }

        if ($request->filled('page_id')) {
            return redirect()->route('images.page', $request->page_id)->with('success', 'Selected images deleted successfully.');
        }

        return redirect()->route('images.show')->with('success', 'Selected images deleted successfully.');
    }

    public function serve(Product $product)
    {
        $page = $product->page;

        if ($page->password && ! Auth::check() && ! session()->get('page_access_' . $page->id)) {
            return redirect()->route('template.show', $page->id);
        }

        if (Storage::disk('local')->exists($product->image)) {
            return response()->file(Storage::disk('local')->path($product->image));
        }

        $legacyImagePath = public_path($product->image);
        abort_unless(file_exists($legacyImagePath), 404);

        return response()->file($legacyImagePath);
    }
}
