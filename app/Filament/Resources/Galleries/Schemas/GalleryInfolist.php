<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GalleryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Judul'),
                TextEntry::make('slug'),
                TextEntry::make('description')
                    ->label('Deskripsi'),
                TextEntry::make('event_date')
                    ->label('Tanggal Event')
                    ->dateTime(),
                ImageEntry::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
