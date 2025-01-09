<?php

namespace App\Filament\Blog\Pages;

use Filament\Pages\Page;

class EditProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.blog.pages.edit-profile';
}
