<?php

namespace App\Filament\Resources\Scores\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ScoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('player_id')
                    ->required()
                    ->relationship('player','name')
                    ->searchable()
                    ->preload()
                    ->disabledOn('edit') 
                    ->dehydrated(), 
                TextInput::make('point')
                    ->required()
                    ->numeric(),
            ]);
    }
}
