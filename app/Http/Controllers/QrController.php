<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrController extends Controller
{
    // public function show(Item $item)
    // {
    //     return view('items.qr-show', compact('item'));
    // }

    public function show(Item $item)
    {
        $pdf = Pdf::loadView('items.qr-show', compact('item'))
            ->setPaper([0, 0, 283.46, 170.08]);

        return $pdf->download("qr-{$item->id}.pdf");
    }
}