<?php

namespace App\Filament\Resources\FoodstuffResource\Pages;

use App\Filament\Resources\FoodstuffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodstuffs extends ListRecords
{
    protected static string $resource = FoodstuffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
