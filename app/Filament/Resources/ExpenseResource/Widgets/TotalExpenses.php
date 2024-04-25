<?php

namespace App\Filament\Resources\ExpenseResource\Widgets;

use App\Filament\Widgets\Stats\TotalExpensesStat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TotalExpenses extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            TotalExpensesStat::make(),
        ];
    }
}
