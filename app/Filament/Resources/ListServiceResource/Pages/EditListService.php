<?php

namespace App\Filament\Resources\ListServiceResource\Pages;

use App\Filament\Resources\ListServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListService extends EditRecord
{
    protected static string $resource = ListServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
