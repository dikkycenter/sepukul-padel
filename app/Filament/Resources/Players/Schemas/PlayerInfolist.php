<?php

namespace App\Filament\Resources\Players\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class PlayerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('gender')
                    ->label('Jenis Kelamin')
                    ->formatStateUsing(fn (string $state): string => match ($state){
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    }),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                ImageEntry::make('avatar')
                    ->disk('public')
                    ->visibility('public'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
