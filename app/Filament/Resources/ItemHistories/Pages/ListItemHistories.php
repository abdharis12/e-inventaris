<?php

namespace App\Filament\Resources\ItemHistories\Pages;

use App\Filament\Resources\ItemHistories\ItemHistoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListItemHistories extends ListRecords
{
    protected static string $resource = ItemHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
