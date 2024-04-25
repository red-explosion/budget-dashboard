<?php

declare(strict_types=1);

namespace App\Filament\Widgets\Stats;

use App\Models\Expense;
use App\Models\Income;
use App\Support\Money;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RemainingBalanceStat
{
    public static function make(): Stat
    {
        return Stat::make('Remaining balance', function (): string {
            $totalIncome = Income::sum('amount');
            $totalExpenses = Expense::sum('amount');

            $remainingBalance = ($totalIncome - $totalExpenses) / 100;

            return Money::format(amount: $remainingBalance);
        });
    }
}
