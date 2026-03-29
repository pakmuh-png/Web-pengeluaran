<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_code')
                    ->required(),
                Select::make('material_id')
                    ->relationship('material', 'material_code')
                    ->searchable()
                    ->required(),
                Select::make('pelanggan_id')
                    ->relationship('pelanggan', 'npk')
                    ->searchable()
                    ->required(),
                Select::make('area_id')
                    ->relationship('area', 'nama_area')
                    ->searchable()
                    ->required(),
                Select::make('pabrik_id')
                    ->relationship('pabrik', 'nama_pabrik')
                    ->searchable()
                    ->required(),
                Select::make('planner_id')
                    ->relationship('planner', 'name')
                    ->searchable()
                    ->required(),
                DateTimePicker::make('order_date')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Toggle::make('status')
                    ->label('Status Validasi')
                    ->required(),
                Select::make('shift')
                    ->options(['rutin' => 'Rutin', 'ta' => 'Ta'])
                    ->default('rutin')
                    ->required(),
            ]);
    }
}
