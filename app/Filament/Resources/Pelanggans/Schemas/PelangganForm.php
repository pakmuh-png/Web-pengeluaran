<?php

namespace App\Filament\Resources\Pelanggans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PelangganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pabrik_id')
                    ->relationship('pabrik', 'nama_pabrik')
                    ->required(),
                TextInput::make('npk')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
