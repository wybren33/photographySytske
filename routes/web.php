<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/voorbeeldcollectie', function () {
    return view('example-collection');
})->name('example.collection');

Route::get('/home', [TestController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    $pages = \App\Models\Page::withCount('products')->latest()->get();
    $images = \App\Models\Product::with('page')->latest()->take(5)->get();

    return view('dashboard', [
        'pageCount' => $pages->count(),
        'imageCount' => \App\Models\Product::count(),
        'pages' => $pages->take(5),
        'images' => $images,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Template routes
Route::get('/page/{pageid}', [TemplateController::class, 'show'])->name('template.show');

Route::post('/page/{pageId}/verify', [TemplateController::class, 'verifyPassword'])
    ->middleware('throttle:5,1')
    ->name('template.verify');

Route::get('/media/{product}', [ImageController::class, 'serve'])->name('media.show');

Route::middleware('auth')->group(function () {
    // Page management routes
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
    Route::put('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

    // Image management routes
    Route::get('/images', [ImageController::class, 'show'])->name('images.show');
    Route::get('/images/create', [ImageController::class, 'create'])->name('images.create');
    Route::get('/images/page/{page}', [ImageController::class, 'folder'])->name('images.page');
    Route::get('/images/page/{page}/create', [ImageController::class, 'create'])->name('images.create.page');
    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
    Route::post('/images/bulkDelete', [ImageController::class, 'bulkDelete'])->name('images.bulkDelete');
});

require __DIR__ . '/auth.php';
