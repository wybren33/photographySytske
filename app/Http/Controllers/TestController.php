<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class TestController extends Controller
{
    public function index()
    {
        $pages = Page::all(); // Fetch all pages
        return view('welcome', compact('pages'));
    }
}
