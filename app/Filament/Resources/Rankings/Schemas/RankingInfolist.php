<?php

namespace App\Filament\Resources\Rankings\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RankingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('rank')
                    ->numeric(),
                TextEntry::make('player.name')
                    ->numeric(),
                TextEntry::make('point')
                    ->numeric(),
                IconEntry::make('valid')
                    ->boolean(),
                TextEntry::make('rank_mov'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
