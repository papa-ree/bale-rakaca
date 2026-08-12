<?php

use Illuminate\Support\Facades\Route;
use Bale\BaleRakaca\Livewire\LandingPage\Index;

// Landing Page Routes
Route::middleware(['web'])->group(function () {
    Route::get('/', Index::class)->name('index');
});
