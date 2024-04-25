<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as FilamentDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends FilamentDashboard
{
    protected static ?string $navigationIcon = 'home';
}
