<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    // Relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
