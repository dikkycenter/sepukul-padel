<?php

namespace App\Filament\Resources\Scores\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ScoreInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('player.avatar')
                    ->label('Avatar')
                    ->label('Avatar')
                    ->disk('public')
                    ->visibility('public'),
                TextEntry::make('player.name')
                    ->label('Nama Pemain'),
                TextEntry::make('point')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
