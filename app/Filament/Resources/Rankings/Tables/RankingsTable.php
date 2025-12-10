<?php

namespace App\Filament\Resources\Rankings\Tables;

use App\Services\RankingService;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class RankingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rank')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('player.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('point')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('valid')
                    ->boolean(),
                TextColumn::make('rank_mov')
                    ->numeric(false)
                    ->formatStateUsing(fn ($state) => (string) $state),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->headerActions([
                Action::make('UpdateRanking')
                    ->label('Update Leaderboard')
                    ->requiresConfirmation()
                    ->modalHeading('Update Leaderboard')
                    ->modalDescription('Ini akan mengupdate Leaderboard terbaru. Apakah kamu yakin?')
                    ->action(function()
                    {
                        $service = app(RankingService::class);
                        $service->generateRankingSnapshot();

                        Notification::make()
                        ->title('Ranking Updated!')
                        ->success()
                        ->send();
                    }),

                
            ])

            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->hidden(),
            ]);

            
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ]);
    }
}
