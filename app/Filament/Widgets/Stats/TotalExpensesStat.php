<?php

declare(strict_types=1);

namespace App\Filament\Widgets\Stats;

use App\Models\Expense;
use App\Support\Money;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalExpensesStat
{
    public static function make(): Stat
    {
        return Stat::make('Total expenses', function (): string {
            $totalExpenses = Expense::sum('amount') / 100;

            return Money::format(amount: $totalExpenses);
        });
    }
}
