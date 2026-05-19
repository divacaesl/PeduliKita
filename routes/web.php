<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/volunteer', 'pages.volunteer')->name('volunteer');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/campaigns', \App\Livewire\Campaigns\Index::class)->name('campaigns.index');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/campaigns/create', \App\Livewire\Campaigns\Create::class)->name('campaigns.create');
});
Route::get('/campaigns/{campaign:slug}', \App\Livewire\Campaigns\Show::class)->name('campaigns.show');

Route::get('/dashboard', function () {
    $donations = auth()->user()->donations()->with('campaign')->latest()->get();
    return view('dashboard', compact('donations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
