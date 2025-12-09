<?php

namespace App\Filament\Resources\Scores\Pages;

use App\Filament\Resources\Scores\ScoreResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewScore extends ViewRecord
{
    protected static string $resource = ScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
