<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scan/{qr}', function ($qr) {
    $item = Item::where('qr_code', $qr)->firstOrFail();
    return view('items.public-show', compact('item'));
})->name('items.scan');
