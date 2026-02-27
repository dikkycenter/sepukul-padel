<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Judul'),
                TextEntry::make('slug'),
                TextEntry::make('event_date')
                    ->label('Tanggal Event')
                    ->dateTime('d F Y'),
                TextEntry::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                ImageEntry::make('image')
                    ->label('Tumbnail')
                    ->disk('public')
                    ->visibility('public'),
                Toggle::make('flag')
                    ->label('Pin')
                    ->hidden(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
