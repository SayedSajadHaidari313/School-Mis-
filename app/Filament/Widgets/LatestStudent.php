<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestStudent extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                ->searchable()
                ->sortable(),
            TextColumn::make('email')->label('Email')
                ->searchable()
                ->sortable(),
            TextColumn::make('name')->label('Name')
                ->badge()
                ->searchable()
                ->sortable(),
            ]);
    }
}
