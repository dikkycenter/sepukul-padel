<?php

namespace App\Filament\Resources\Scores;

use App\Filament\Resources\Scores\Pages\CreateScore;
use App\Filament\Resources\Scores\Pages\EditScore;
use App\Filament\Resources\Scores\Pages\ListScores;
use App\Filament\Resources\Scores\Pages\ViewScore;
use App\Filament\Resources\Scores\Schemas\ScoreForm;
use App\Filament\Resources\Scores\Schemas\ScoreInfolist;
use App\Filament\Resources\Scores\Tables\ScoresTable;
use App\Models\Score;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ScoreResource extends Resource
{
    protected static ?string $model = Score::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Score';

    public static function form(Schema $schema): Schema
    {
        return ScoreForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ScoreInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ScoresTable::configure($table);
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
            'index' => ListScores::route('/'),
            'create' => CreateScore::route('/create'),
            'view' => ViewScore::route('/{record}'),
            'edit' => EditScore::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery() ->where('valid', true);
    }

    
}
