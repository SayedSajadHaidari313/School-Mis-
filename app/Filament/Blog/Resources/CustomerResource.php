<?php

namespace App\Filament\Blog\Resources;

use App\Filament\Blog\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->preload()
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255)
                    ->default(null),
                Select::make('status')
                    ->required()
                    ->default('active')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Customer::where('user_id', auth()->id())) // فیلتر بر اساس کاربر وارد شده
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.email')->label('Email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\TextColumn::make('address')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()->colors([
                    'primary' => 'Active',
                    'danger' => 'Inactive',
                ]),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Section::make('Customer Information')
                    ->columns(3)
                    ->schema([
                        ImageEntry::make('user.image')
                            ->label('Avatar')
                            ->circular()
                            ->default(function ($record) {
                                return $record->getFilamentAvatarUrl(); // فراخوانی از مدل Customer
                            }),
                        Group::make()
                            ->columnSpan(2)
                            ->columns(3)
                            ->schema([
                                TextEntry::make('user.name')->label('Name'),
                                TextEntry::make('user.email')->label('Email'),
                                TextEntry::make('phone')->label('Phone'),
                                TextEntry::make('address')->label('Address'),
                                TextEntry::make('status')->label('Status')
                                    ->badge()
                                    ->color(function ($state) {
                                        if ($state == 'active') {
                                            return 'success';
                                        }
                                        return 'danger';
                                    }),
                            ]),
                ]),
                Section::make('Orders Information')
                ->schema([
                    Group::make()
                        ->label('Orders')
                        ->schema([
                            TextEntry::make('orders.0.package.name')->label('Package Name'),
                            TextEntry::make('orders.0.domain.domain_name')->label('Domain'),
                            TextEntry::make('orders.0.email.email_name')->label('Email'),
                            TextEntry::make('orders.0.price')->label('Price')->prefix('$'),
                            TextEntry::make('orders.0.order_date')->label('Order Date')->date(),
                            TextEntry::make('orders.0.expire_date')->label('Expire Date')->date(),
                            TextEntry::make('orders.0.status')->label('Status')
                                ->badge()
                                ->colors([
                                    'primary' => 'ACTIVE',
                                    'danger' => 'EXPIRED',
                                    'warning' => '30_DAYS_EXPIRED',
                                ]),
                        ]),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
            'view' => Pages\ViewCustomer::route('/{record}'),
        ];
    }
}
