<?php

namespace App\Filament\Resources\Pabriks\Pages;

use App\Filament\Resources\Pabriks\PabrikResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPabriks extends ListRecords
{
    protected static string $resource = PabrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
