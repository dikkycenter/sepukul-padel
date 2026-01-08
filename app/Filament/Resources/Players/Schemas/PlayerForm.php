<?php

namespace App\Filament\Resources\Players\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PlayerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->placeholder('contoh: Miko Hutabarat')
                    ->required(),
                Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['L' => 'Laki-Laki', 'P' => 'Perempuan'])
                    ->required(),
                TextInput::make('phone')
                    ->label('No. Telp/Whatsapp')
                    ->placeholder('contoh: 08xxxxxxxxxx')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->placeholder('contoh: mikohtb@gmail.com')
                    ->email()
                    ->required()
                    ->unique('players','email',ignoreRecord: true),
                FileUpload::make('avatar')
                    ->image()
                    ->acceptedFileTypes(['image/png'])
                    ->maxSize(6000)
                    ->imageEditor()
                    ->imageEditorAspectRatios(['1:1'])
                    ->disk('public')
                    ->directory('avatars')
                    ->nullable(),
            ]);
    }
}
