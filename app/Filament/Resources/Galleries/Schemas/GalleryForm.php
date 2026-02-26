<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabled(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),
                DatePicker::make('event_date')
                    ->label('Tanggal Event')
                    ->native(false),
                FileUpload::make('image')
                    ->label('Upload Gambar')
                    ->columnSpanFull()
                    ->image()
                    ->disk('public')
                    ->multiple()
                    ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/webp'])
                    ->imageEditor()
                    ->required(),
            ]);
    }
}
