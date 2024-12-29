<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Section;
use App\Models\Student;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Student Management';


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->rules('max:20')
                    ->placeholder('Enter your name'),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->placeholder('Enter your email'),
                Select::make('class_id')
                    ->label('Class')
                    ->live()
                    ->relationship('classes', 'name')
                    ->searchable()
                    ->required()
                    ->preload(),
                Select::make('section_id')
                    ->label('Section')
                    ->options(function (Get $get) {
                        $class_id = $get('class_id');
                        return Section::where('class_id', $class_id)->pluck('name', 'id')->toArray();
                    })
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('section.name')->label('Section')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('classes.name')->label('Class')
                    ->badge()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('class_id')
                    ->label('Class')
                    ->multiple()
                    ->preload()
                    ->relationship('classes', 'name'),
                SelectFilter::make('section_id')
                    ->label('Section')
                    ->multiple()
                    ->preload()
                    ->relationship('section', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
