<?php

namespace App\Filament\Resources\ListServiceResource\Pages;

use App\Filament\Resources\ListServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListServices extends ListRecords
{
    protected static string $resource = ListServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
