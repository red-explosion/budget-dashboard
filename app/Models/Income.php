<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\Pence;
use Illuminate\Database\Eloquent\Model;
use RedExplosion\Sqids\Concerns\HasSqids;

class Income extends Model
{
    use HasSqids;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => Pence::class,
        ];
    }
}
