<?php

namespace App\Filament\Resources\Planners\Pages;

use App\Filament\Resources\Planners\PlannerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlanners extends ListRecords
{
    protected static string $resource = PlannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
