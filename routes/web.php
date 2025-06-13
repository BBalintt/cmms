<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Maintenance;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/asdf', function () {
    return "szia!";
});

Route::get('/naptar/export', function () {
    $events = Maintenance::all()->map(function ($item) {
        return [
            'Eszköz' => optional($item->device)->name,
            'Leírás' => $item->description,
            'Ütemezett idő' => $item->scheduled_at,
            'Létrehozva' => $item->created_at,
        ];
    });

    $pdf = Pdf::loadView('exports.calendar', ['events' => $events]);

    return $pdf->download('karbantartasi-naptar.pdf');
})->name('calendar.export');
