<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PackagePricing;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PackagePricingResource\Pages;
use App\Filament\Resources\PackagePricingResource\RelationManagers;

class PackagePricingResource extends Resource
{
    protected static ?string $model = PackagePricing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('package_id')
                    ->label('Harga Paket Wisata')
                    ->relationship('package', 'name')
                    ->required(),
                Select::make('destination_id')
                    ->label('Destinasi Wisata')
                    ->relationship('destination', 'name')
                    ->required(),
                TextInput::make('price')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('package.name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Paket Wisata'),
                TextColumn::make('destination.name')
                    ->searchable()
                    ->sortable()
                    ->label('Destinasi Wisata'),
                TextColumn::make('price')
                    ->label('Harga Destinasi Wisata')
                    ->sortable(),
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
            'index' => Pages\ListPackagePricings::route('/'),
            'create' => Pages\CreatePackagePricing::route('/create'),
            'edit' => Pages\EditPackagePricing::route('/{record}/edit'),
        ];
    }
}
