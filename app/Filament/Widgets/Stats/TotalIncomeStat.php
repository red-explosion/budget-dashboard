<?php

declare(strict_types=1);

namespace App\Filament\Widgets\Stats;

use App\Models\Income;
use App\Support\Money;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalIncomeStat
{
    public static function make(): Stat
    {
        return Stat::make('Total income', function (): string {
            $totalIncome = Income::sum('amount') / 100;

            return Money::format(amount: $totalIncome);
        });
    }
}
