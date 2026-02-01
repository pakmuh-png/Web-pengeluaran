<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_code')
                    ->required(),
                TextInput::make('material_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pelanggan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('area_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pabrik_id')
                    ->required()
                    ->numeric(),
                TextInput::make('planner_id')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('order_date')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['true' => 'True', 'false' => 'False'])
                    ->default('false')
                    ->required(),
                Select::make('shift')
                    ->options(['rutin' => 'Rutin', 'ta' => 'Ta'])
                    ->default('rutin')
                    ->required(),
            ]);
    }
}
