<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email() // Ensures the input is a valid email format
                    ->required(),

                // Password field: required on create, optional on edit
                TextInput::make('password')
                    ->label('Password')
                    ->password() // Input type password
                    ->required(fn($record) => !$record) // Required only when creating a new user
                    ->dehydrated(fn($state) => filled($state)) // Only send the password to the server if it's filled
                    ->rule(Password::min(8)), // Password rule (min 8 characters)

                // Password confirmation field: only required when the password is filled
                TextInput::make('password_confirmation')
                    ->label('Password Confirmation')
                    ->password() // Input type password
                    ->same('password') // Must match the password field
                    ->required(fn($get) => filled($get('password'))) // Only required if the password is filled
                    ->dehydrated(false), // This field will not be saved to the database
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Name'),

                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),

                TextColumn::make('created_at')
                    ->label('Created At'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}