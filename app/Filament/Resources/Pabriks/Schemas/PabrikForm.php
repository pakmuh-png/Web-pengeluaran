<?php

namespace App\Filament\Resources\Pabriks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PabrikForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pabrik')
                    ->required(),
            ]);
    }
}
