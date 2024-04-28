<?php

declare(strict_types=1);

namespace App\Filament\Resources\IncomeResource\Widgets;

use App\Filament\Widgets\Stats\TotalIncomeStat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TotalIncome extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            TotalIncomeStat::make(),
        ];
    }
}
