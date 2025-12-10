<?php

namespace App\Filament\Resources\Rankings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RankingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('rank')
                    ->required()
                    ->numeric(),
                Select::make('player_id')
                    ->relationship('player', 'name')
                    ->required(),
                TextInput::make('point')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('valid')
                    ->required(),
                TextInput::make('rank_mov')
                    ->default(null),
            ]);
    }
}
