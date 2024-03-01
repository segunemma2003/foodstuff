<?php

namespace App\Filament\Resources\FoodstuffResource\Pages;

use App\Filament\Resources\FoodstuffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodstuff extends EditRecord
{
    protected static string $resource = FoodstuffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
