<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'total_price'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
