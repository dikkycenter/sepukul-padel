<?php

namespace App\Filament\Resources\Rankings\Pages;

use App\Filament\Resources\Rankings\RankingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListRankings extends ListRecords
{
    protected static string $resource = RankingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->hidden(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Laki-laki' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->whereHas('player', fn ($q) =>
                        $q->where('gender', 'L')
                    )
                ),

            'Perempuan' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->whereHas('player', fn ($q) =>
                        $q->where('gender', 'P')
                    )
                ),
        ];
    }
    
}
