<?php

namespace App\Filament\Widgets;

use App\Models\Overview;
use App\Support\Money;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class BudgetOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Overview::query())
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->html()
                    ->formatStateUsing(function (Overview $record) {
                        if ($record->heading || $record->summary) {
                            return "<strong>{$record->name}</strong>";
                        }

                        return $record->name;
                    }),

                Tables\Columns\TextColumn::make('amount')
                    ->html()
                    ->formatStateUsing(function (Overview $record) {
                        $amount = Money::format($record->amount);

                        if ($record->summary) {
                            return "<strong>{$amount}</strong>";
                        }

                        return $amount;
                    }),
            ])
            ->paginated(false);
    }
}
