<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'is_capital',
    ];

    protected function casts(): array
    {
        return [
            'is_capital' => 'boolean',
        ];
    }
}
