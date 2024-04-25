<?php

declare(strict_types=1);

namespace App\Support;

class Money
{
    public static function format(float $amount): string
    {
        $amount = sprintf('%0.2f', $amount);

        return "£{$amount}";
    }
}
