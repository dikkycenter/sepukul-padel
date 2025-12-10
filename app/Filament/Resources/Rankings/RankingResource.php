<?php

namespace App\Filament\Resources\Rankings;

use App\Filament\Resources\Rankings\Pages\CreateRanking;
use App\Filament\Resources\Rankings\Pages\EditRanking;
use App\Filament\Resources\Rankings\Pages\ListRankings;
use App\Filament\Resources\Rankings\Pages\ViewRanking;
use App\Filament\Resources\Rankings\Schemas\RankingForm;
use App\Filament\Resources\Rankings\Schemas\RankingInfolist;
use App\Filament\Resources\Rankings\Tables\RankingsTable;
use App\Models\Ranking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RankingResource extends Resource
{
    protected static ?string $model = Ranking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Ranking';

    public static function form(Schema $schema): Schema
    {
        return RankingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RankingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RankingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRankings::route('/'),
            'create' => CreateRanking::route('/create'),
            'view' => ViewRanking::route('/{record}'),
            'edit' => EditRanking::route('/{record}/edit'),
        ];
    }
}
