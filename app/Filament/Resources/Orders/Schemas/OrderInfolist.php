<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('order_code'),
                TextEntry::make('material_id')
                    ->numeric(),
                TextEntry::make('pelanggan_id')
                    ->numeric(),
                TextEntry::make('area_id')
                    ->numeric(),
                TextEntry::make('pabrik_id')
                    ->numeric(),
                TextEntry::make('planner_id')
                    ->numeric(),
                TextEntry::make('order_date')
                    ->dateTime(),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
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
