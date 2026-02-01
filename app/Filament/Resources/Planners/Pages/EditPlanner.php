<?php

namespace App\Filament\Resources\Planners\Pages;

use App\Filament\Resources\Planners\PlannerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPlanner extends EditRecord
{
    protected static string $resource = PlannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
