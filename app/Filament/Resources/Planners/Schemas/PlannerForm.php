<?php

namespace App\Filament\Resources\Planners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PlannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
            ]);
    }
}
