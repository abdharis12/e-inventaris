<?php

namespace App\Filament\Resources\ItemHistories;

use App\Filament\Resources\ItemHistories\Pages\CreateItemHistory;
use App\Filament\Resources\ItemHistories\Pages\EditItemHistory;
use App\Filament\Resources\ItemHistories\Pages\ListItemHistories;
use App\Filament\Resources\ItemHistories\Schemas\ItemHistoryForm;
use App\Filament\Resources\ItemHistories\Tables\ItemHistoriesTable;
use App\Models\ItemHistory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ItemHistoryResource extends Resource
{
    protected static ?string $model = ItemHistory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Histories';

    protected static string | UnitEnum | null $navigationGroup = 'Inventory';

    public static function form(Schema $schema): Schema
    {
        return ItemHistoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ItemHistoriesTable::configure($table);
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
            'index' => ListItemHistories::route('/'),
            'create' => CreateItemHistory::route('/create'),
            'edit' => EditItemHistory::route('/{record}/edit'),
        ];
    }
}
