<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_code')
                    ->label('Order Code')
                    ->searchable(),
                TextColumn::make('material.material_code')
                    ->label('Material')
                    ->description(fn ($record) => $record->material?->description)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pelanggan.npk')
                    ->label('NPK/Pelanggan')
                    ->description(fn ($record) => $record->pelanggan?->nama)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('area.nama_area')
                    ->label('Area')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pabrik.nama_pabrik')
                    ->label('Pabrik')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('planner.name')
                    ->label('Planner')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('order_date')
                    ->label('Order Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Qty')
                    ->numeric()
                    ->sortable(),
                ToggleColumn::make('status')
                    ->label('Status Validasi'),
                TextColumn::make('shift')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
