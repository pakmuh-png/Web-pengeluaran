<?php

namespace App\Filament\Resources\Planners;

use App\Filament\Resources\Planners\Pages\CreatePlanner;
use App\Filament\Resources\Planners\Pages\EditPlanner;
use App\Filament\Resources\Planners\Pages\ListPlanners;
use App\Filament\Resources\Planners\Schemas\PlannerForm;
use App\Filament\Resources\Planners\Tables\PlannersTable;
use App\Models\Planner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlannerResource extends Resource
{
    protected static ?string $model = Planner::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user';

    public static function form(Schema $schema): Schema
    {
        return PlannerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlannersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlanners::route('/'),
            'create' => CreatePlanner::route('/create'),
            'edit' => EditPlanner::route('/{record}/edit'),
        ];
    }
}
