<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('order_code'),
                TextEntry::make('material.material_code')
                    ->label('Material'),
                TextEntry::make('pelanggan.npk')
                    ->label('NPK/Pelanggan'),
                TextEntry::make('area.nama_area')
                    ->label('Area'),
                TextEntry::make('pabrik.nama_pabrik')
                    ->label('Pabrik'),
                TextEntry::make('planner.name')
                    ->label('Planner'),
                TextEntry::make('order_date')
                    ->dateTime(),
                TextEntry::make('quantity')
                    ->numeric(),
                IconEntry::make('status')
                    ->boolean()
                    ->label('Status Validasi'),
                TextEntry::make('shift')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
