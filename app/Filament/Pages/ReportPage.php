<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ReportPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static string $view = 'filament.pages.report-page';

    protected static ?string $navigationGroup = 'Riportok';
    protected static ?string $navigationLabel = 'Karbantartási riport';
}
