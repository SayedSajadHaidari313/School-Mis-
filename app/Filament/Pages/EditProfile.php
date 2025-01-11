<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'User Profile';
    protected static string $view = 'filament.pages.edit-profile';
    protected static ?string $navigationGroup = 'Settings';

    public ?array $data = [];

    public function mount()
    {
        $profile = auth()->user()->profile;
        if ($profile) {
            $this->form->fill($profile->attributesToArray());
        } else {
            // Handle the case where the profile does not exist
            // For example, you can initialize the form with default values
            $this->form->fill([]);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('phone')
                    ->label('Phone Number')
                    ->required()
                    ->placeholder('Enter your phone number'),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->label('Profile Image')
                    ->imageEditor(),
            ])
            ->statePath('data'); // Ensure this is correctly placed after the schema
    }

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->submit('save'),
        ];
    }
    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $profile = auth()->user()->profile;

            if ($profile) {
                $profile->update($data);
            } else {
                // Optionally create a new profile
                auth()->user()->profile()->create($data);
            }
        } catch (Halt $exception) {
            return;
        }
    }
}
