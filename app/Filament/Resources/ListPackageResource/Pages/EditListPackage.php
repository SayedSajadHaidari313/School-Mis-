<?php

namespace App\Filament\Resources\ListPackageResource\Pages;

use App\Filament\Resources\ListPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListPackage extends EditRecord
{
    protected static string $resource = ListPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
