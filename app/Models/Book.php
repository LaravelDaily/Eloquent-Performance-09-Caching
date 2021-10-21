<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Book extends Model
{
    use HasFactory, QueryCacheable;

    public $cacheFor = 3600; // cache time, in seconds

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
