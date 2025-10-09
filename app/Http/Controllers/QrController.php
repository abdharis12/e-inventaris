<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrController extends Controller
{
    public function show(Item $item)
    {
$pdf = Pdf::loadView('items.qr-show', compact('item'))
    ->setPaper([0, 0, 300, 140]) // tambah tinggi 10pt dari sebelumnya
    ->setOptions([
        'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,
        'enable_php' => true,
        'chroot' => storage_path('app/public/qrcodes'),
        'margin-top' => 0,
        'margin-right' => 0,
        'margin-bottom' => 0,
        'margin-left' => 0,
    ]);

return $pdf->download("qr-{$item->id}.pdf");



    }
}