<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\BudgetOverview;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Overview extends Model
{
    use Sushi;

    public function getRows(): array
    {
        return BudgetOverview::make()->toArray();
    }
}
