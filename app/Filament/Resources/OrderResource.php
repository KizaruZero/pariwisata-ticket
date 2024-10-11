<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('destination.name')->label('Destination')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('package.name')
                    ->label('Package'),
                TextColumn::make('payment_method')->label('Payment Method'),
                TextColumn::make('booking_date')->label('Booking Date'),
                TextColumn::make('total_price')->label('Total Price')->money('idr', true)
                    ->searchable()
                    ->sortable(),
                BadgeColumn::make('status')->state(function (Order $record): string {
                    return match ($record->status) { 'pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected', default => $record->status,
                    };
                })->colors([
                            'primary' => 'Pending',
                            'success' => 'Approved',
                            'danger' => 'Rejected',
                        ])
                    ->icons([
                        'heroicon-o-clock' => 'Pending',
                        'heroicon-o-check-circle' => 'Approved',
                        'heroicon-o-x-circle' => 'Rejected',
                    ])
                    ->sortable(),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->visible(fn(Order $record) => $record->status === 'pending')
                    ->action(function (Order $record) {
                        $record->update([
                            'status' => 'approved',
                            'approved_at' => now(),
                        ]);
                        // Kirim receipt ke buyer (email dengan PDF)
                        \Mail::to($record->user->email)->send(new \App\Mail\OrderReceipt($record));
                        $record->destination->updateTotalOrders();
                        return response()->json(['message' => 'Order approved and receipt sent to the user!']);
                    }),

                Action::make('reject')
                    ->label('Reject')
                    ->visible(fn(Order $record) => $record->status === 'pending')
                    ->action(fn(Order $record) => $record->update(['status' => 'rejected'])),
            ])
            ->groups([
                Tables\Grouping\Group::make('booking_date')
                    ->label('Booking Date')
                    ->date()
                    ->collapsible(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            OrderStats::class,
        ];
    }
}