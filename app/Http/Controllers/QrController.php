<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrController extends Controller
{
    // Tampilkan QR (inline sebagai gambar)
    public function show(Item $item)
    {
        return view('items.qr-show', compact('item'));
    }
}