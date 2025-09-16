<?php

namespace App\Filament\Resources\ItemHistories\Pages;

use App\Filament\Resources\ItemHistories\ItemHistoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditItemHistory extends EditRecord
{
    protected static string $resource = ItemHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
