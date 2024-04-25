<?php

namespace App\Filament\Resources\IncomeResource\Widgets;

use App\Filament\Widgets\Stats\TotalIncomeStat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalIncome extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            TotalIncomeStat::make(),
        ];
    }
}
