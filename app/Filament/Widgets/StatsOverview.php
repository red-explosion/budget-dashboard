<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Filament\Widgets\Stats\RemainingBalanceStat;
use App\Filament\Widgets\Stats\TotalExpensesStat;
use App\Filament\Widgets\Stats\TotalIncomeStat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            TotalIncomeStat::make(),
            TotalExpensesStat::make(),
            RemainingBalanceStat::make(),
        ];
    }
}
