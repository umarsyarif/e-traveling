<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['is_available', 'is_quota_fulfilled'];

    // Getters
    public function getIsAvailableAttribute()
    {
        return $this->attributes['start_date'] < date('Y-m-d');
    }

    public function getIsQuotaFulfilled()
    {
        return $this->orders()->where('is_accepted', 1)->get()->count() < $this->attributes['quota'];
    }

    // Relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
