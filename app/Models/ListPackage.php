<?php

namespace App\Models;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput; // اضافه کردن این خط
use Filament\Forms\Components\Textarea; // اضافه کردن این خط
use Illuminate\Database\Eloquent\Model;

class ListPackage extends Model
{
    protected $fillable = [
        'name',
        'description',
        'disk_space_quota',
        'bandwidth_limit',
        'max_ftp_accounts',
        'max_email_accounts',
        'max_sql_databases',
        'max_sub_domains',
        'max_parked_domains',
        'max_addon_domains',
        'max_mailing_lists',
        'max_passenger_apps',
        'max_hourly_email',
        'max_email_quota_per_address',
    ];

    public static function getForm(): array
    {
        return [
            Section::make('Package Detail')
            ->collapsible()
            ->columns(2)
            ->schema([
                TextInput::make('name') // استفاده از TextInput
                ->required()
                ->maxLength(255),
                RichEditor::make('description') // استفاده از Textarea
                ->columnSpanFull(),
                TextInput::make('disk_space_quota')
                ->numeric()
                ->default(null),
                TextInput::make('bandwidth_limit')
                ->numeric()
                ->default(null),
                TextInput::make('max_ftp_accounts')
                ->numeric()
                ->default(null),
                TextInput::make('max_email_accounts')
                ->numeric()
                ->default(null),
                TextInput::make('max_sql_databases')
                ->numeric()
                ->default(null),
                TextInput::make('max_sub_domains')
                ->numeric()
                ->default(null),
                TextInput::make('max_parked_domains')
                ->numeric()
                ->default(null),
                TextInput::make('max_addon_domains')
                ->numeric()
                ->default(null),
                TextInput::make('max_mailing_lists')
                ->numeric()
                ->default(null),
                TextInput::make('max_passenger_apps')
                ->numeric()
                ->default(null),
                TextInput::make('max_hourly_email')
                ->numeric()
                ->default(null),
                TextInput::make('max_email_quota_per_address')
                ->numeric()
                ->default(null),
            ]) // حذف ] اضافی
        ];
    }
}