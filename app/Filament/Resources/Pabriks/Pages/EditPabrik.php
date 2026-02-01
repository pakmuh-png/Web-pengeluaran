<?php

namespace App\Filament\Resources\Pabriks\Pages;

use App\Filament\Resources\Pabriks\PabrikResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPabrik extends EditRecord
{
    protected static string $resource = PabrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
