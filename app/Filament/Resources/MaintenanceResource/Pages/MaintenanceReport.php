<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use App\Filament\Resources\MaintenanceResource;
use Filament\Resources\Pages\Page;

class MaintenanceReport extends Page
{
    protected static string $resource = MaintenanceResource::class;

    protected static string $view = 'filament.resources.maintenance-resource.pages.maintenance-report';
}
