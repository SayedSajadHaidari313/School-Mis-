<?php

namespace App\Filament\Blog\Resources\CustomerResource\Pages;

use App\Filament\Blog\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
}
