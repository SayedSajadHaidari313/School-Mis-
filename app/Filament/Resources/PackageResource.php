<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('disk_space_quota')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('bandwidth_limit')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_ftp_accounts')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_email_accounts')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_sql_databases')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_sub_domains')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_parked_domains')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_addon_domains')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_mailing_lists')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_passenger_apps')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_hourly_email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('max_email_quota_per_address')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disk_space_quota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bandwidth_limit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_ftp_accounts')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_email_accounts')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_sql_databases')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_sub_domains')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_parked_domains')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_addon_domains')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_mailing_lists')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_passenger_apps')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_hourly_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_email_quota_per_address')
                    ->searchable(),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
