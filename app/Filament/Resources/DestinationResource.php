<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use App\Models\Destination;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Text;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DestinationResource\Pages;
use App\Filament\Resources\DestinationResource\RelationManagers;
use App\Filament\Resources\DestinationResource\RelationManagers\CategoryRelationManager;
use App\Filament\Resources\DestinationResource\RelationManagers\RegionRelationManager;
use App\Models\Category;
use App\Models\Region;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;


class DestinationResource extends Resource
{
    protected static ?string $model = Destination::class;
    protected static ?string $navigationGroup = 'Management';
    protected static ?string $navigationIcon = 'heroicon-s-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Textarea::make('description')
                    ->label('Description')
                    ->required(),
                TextInput::make('location')
                    ->label('Location')
                    ->required(),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('region_id')
                    ->label('Region/Wilayah')
                    ->relationship('region', 'name')
                    ->required(),
                FileUpload::make('image_url')
                    ->image()
                    ->label('Image'),
                TextInput::make('rating')
                    ->label('Rating')
                    ->nullable(),
                TextInput::make('total_orders')
                    ->label('total_orders')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->searchable(),
                TextColumn::make('region.name')
                    ->searchable(),
                ImageColumn::make('image_url'),
                TextColumn::make('rating')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total_orders')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total_reviews')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total_views')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total_likes')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('popularity')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Filter by Category')
                    ->relationship('category', 'name'),

                SelectFilter::make('region')
                    ->label('Filter by Region')
                    ->relationship('region', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()->exports([
                    ExcelExport::make('export')
                    ->fromTable()
                    ->only(['name', 'description', 'location', 'category.name', 'region.name' ])
                    ->withFilename('destinasi-' . date('Y-m-d'))
                    ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                ])
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
            'index' => Pages\ListDestinations::route('/'),
            'create' => Pages\CreateDestination::route('/create'),
            'edit' => Pages\EditDestination::route('/{record}/edit'),
        ];
    }
}
