<?php

namespace App\Filament\Resources\Materials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MaterialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('material_code')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('qty')
                    ->columnSpanFull(),
                TextInput::make('uom'),
                TextInput::make('bin_location'),
                TextInput::make('storage_location'),
            ]);
    }
}
