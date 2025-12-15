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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\TabsFilter;
use Filament\Tables\Filters\TabsFilter\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;

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
                IconColumn::make('rank_mov')
                    ->icon(function (string $state): string {
                        $sign = substr($state, 0, 1);
                        return match ($sign) {
                            '+' => 'heroicon-m-arrow-up',
                            '-' => 'heroicon-m-arrow-down',
                            default => 'heroicon-m-minus',
                        };
                    })
                    ->color(function (string $state): string {
                        $sign = substr($state, 0, 1);
                        return match ($sign) {
                        '+' => 'success',
                        '-' => 'danger',
                        default => 'gray',
                         };
                    })

                    ->tooltip(fn (string $state): string => $state === 'none' ? '0' : ltrim($state, '+-'))
                    
                    ->alignCenter(),

                TextColumn::make('rank_mov')
                    ->label('Rank Mov')
                    ->state(function ($record): string {
                        $state = $record->rank_mov;

                        if ($state === null || $state === '' || $state === 'none') {
                            return '–';
                        }

                        $sign = substr($state, 0, 1);
                        $number = ltrim($state, '+-');

                        return match ($sign) {
                            '+' => '▲ ' . $number,
                            '-' => '▼ ' . $number,
                            default => $state,
                        };
                    })
                    ->color(function ($record): string {
                        $state = $record->rank_mov;

                        if ($state === null || $state === '' || $state === 'none') {
                            return 'gray';
                        }

                        return match (substr($state, 0, 1)) {
                            '+' => 'success',
                            '-' => 'danger',
                            default => 'gray',
                        };
                    })
                    ->alignCenter(),


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
                        $result  = $service->updateLeaderboard();

                        if (!$result)
                        {
                            Notification::make()
                                ->title('Tidak ada perubahan Data!')
                                ->warning()
                                ->send();
                            
                            return;
                        }
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
            ])
            ;  

            
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ]);
    }
}
