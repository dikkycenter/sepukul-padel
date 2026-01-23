<?php

namespace App\Filament\Resources\Scores\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScoresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('player.avatar')
                    ->label('Avatar')
                    ->disk('public')
                    ->visibility('public')
                    // ->getStateUsing(fn($record) => $record->avatar_url)
                    ->circular()
                    ->extraImgAttributes([
                        'loading' => 'lazy',
                    ]),
                TextColumn::make('player.name')
                    ->label('Nama Pemain')
                    ->sortable(),
                TextColumn::make('point')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //     DeleteBulkAction::make(),
            //     ]),
            // ])
            ->defaultSort('point', 'desc');
    }
}
