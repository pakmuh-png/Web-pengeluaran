<?php

namespace App\Filament\Resources\Pabriks;

use App\Filament\Resources\Pabriks\Pages\CreatePabrik;
use App\Filament\Resources\Pabriks\Pages\EditPabrik;
use App\Filament\Resources\Pabriks\Pages\ListPabriks;
use App\Filament\Resources\Pabriks\Schemas\PabrikForm;
use App\Filament\Resources\Pabriks\Tables\PabriksTable;
use App\Models\Pabrik;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PabrikResource extends Resource
{
    protected static ?string $model = Pabrik::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Pabrik';

    public static function form(Schema $schema): Schema
    {
        return PabrikForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PabriksTable::configure($table);
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
            'index' => ListPabriks::route('/'),
            'create' => CreatePabrik::route('/create'),
            'edit' => EditPabrik::route('/{record}/edit'),
        ];
    }
}
