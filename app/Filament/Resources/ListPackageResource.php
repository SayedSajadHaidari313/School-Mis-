<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListPackageResource\Pages;
use App\Filament\Resources\ListPackageResource\RelationManagers;
use App\Models\ListPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListPackageResource extends Resource
{
    protected static ?string $model = ListPackage::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Customer Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(ListPackage::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disk_space_quota')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bandwidth_limit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_ftp_accounts')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_email_accounts')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_sql_databases')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_sub_domains')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_parked_domains')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('max_addon_domains')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_mailing_lists')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_passenger_apps')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('max_hourly_email')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_email_quota_per_address')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListListPackages::route('/'),
            'create' => Pages\CreateListPackage::route('/create'),
            'edit' => Pages\EditListPackage::route('/{record}/edit'),
        ];
    }
}
