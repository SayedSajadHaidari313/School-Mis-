<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Order Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Customer')
                    ->relationship('user', 'name', function (Builder $query) {
                        $query->whereHas('roles', function (Builder $query) {
                            $query->where('name', 'customer');
                        });
                    })
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('package_id')
                    ->relationship('package', 'name')
                    ->label('Package')
                    ->default(null),
                Forms\Components\Select::make('domain_id')
                    ->label('Domain')
                    ->relationship('domain', 'domain_name')
                    ->default(null),
                Forms\Components\Select::make('email_id')
                    ->label('Email')
                    ->relationship('email', 'email_name')
                    ->default(null),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\DatePicker::make('order_date')
                    ->required(),
                Forms\Components\DatePicker::make('expire_date')
                    ->required(),
                Select::make('status')
                    ->required()
                    ->default('active')
                    ->options([
                        'EXPIRED' => 'Expired',
                        'ACTIVE' => 'Active',
                        '30_DAYS_EXPIRED' => '30 Days Expired',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable(),
                Tables\Columns\TextColumn::make('package.name')
                    ->label('Package')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('domain.domain_name')
                    ->label('Domain')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email.email_name')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_date')
                    ->date()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expire_date')
                    ->date()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->colors([
                        'primary' => 'ACTIVE',
                        'danger' => 'EXPIRED',
                        'orange' => '30_DAYS_EXPIRED',
                    ]),                Tables\Columns\TextColumn::make('created_at')
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
