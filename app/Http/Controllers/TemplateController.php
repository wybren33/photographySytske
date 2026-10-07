<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Hash;

class TemplateController extends Controller
{
    public function show($pageId)
    {
        $page = Page::where('id', $pageId)->with(['products' => function ($query) {
            $query->orderBy('image', 'asc');
        }])->firstOrFail();

        // Check if the page has a password and if the session doesn't already indicate access
        if ($page->password && !session()->get('page_access_' . $page->id)) {
            // Redirect to the password entry form
            return view('password_entry', compact('page')); // Ensure you have a 'password_entry' view
        }

        $pages = Page::all();

        return view('template.view', compact('page', 'pages'));
    }

    public function verifyPassword(Request $request, $pageId)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $page = Page::findOrFail($pageId);

        if ($page->password && Hash::check($request->password, $page->password)) {
            // Set a session variable to indicate access
            session()->put('page_access_' . $page->id, true);
            $request->session()->regenerate();

            // Password is correct, redirect to the page view
            return redirect()->action([TemplateController::class, 'show'], ['pageid' => $pageId]);
        } else {
            // Password is incorrect, redirect back with error
            return back()->withErrors(['password' => 'The password is incorrect.']);
        }
    }
}
