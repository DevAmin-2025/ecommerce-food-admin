<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\Jalalian;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function getStatusAttribute(string $status): string
    {
        switch ($status) {
            case '0':
                $status = 'ناموفق';
                break;
            case '1':
                $status = 'موفق';
                break;
        }
        return $status;
    }

    public function scopeGetData(Builder $query, int $month, int $status): Builder
    {
        $yearAgo = Jalalian::now()->subMonths($month - 1)->toCarbon()->format('Y-m-1');
        return $query->where('created_at', '>=', $yearAgo)->where('status', $status);
    }
}
