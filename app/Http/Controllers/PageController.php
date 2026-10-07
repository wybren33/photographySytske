<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function create()
    {
        $pages = Page::all();
        return view('pages.create', ['pages' => $pages]);
    }

    public function edit(Page $page)
    {
        return view('pages.edit', ['page' => $page]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->content;
        $page->password = Hash::make($request->password);
        $page->save();

        return redirect()->route('pages.create')->with('success', 'Page created successfully.');
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'password' => 'nullable|string|min:6',
        ]);

        $page->title = $validated['title'];
        $page->content = $validated['content'];

        if (! empty($validated['password'])) {
            $page->password = Hash::make($validated['password']);
        }

        $page->save();

        return redirect()->route('pages.create')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.create')->with('success', 'Page deleted successfully.');
    }
}
