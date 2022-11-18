<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'is_available',
        'is_quota_not_fulfilled',
        'fulfilled_quota',
        'price_str',
        'status'
    ];

    // Getters
    public function getIsAvailableAttribute()
    {
        return date('Y-m-d') < $this->attributes['start_date'];
    }

    public function getIsQuotaNotFulfilledAttribute()
    {
        return $this->getFullfiledQuotaAttribute() < $this->attributes['quota'];
    }

    public function getFullfiledQuotaAttribute()
    {
        return $this->orders()->where('is_accepted', 1)->get()->count();
    }

    public function getStatusAttribute()
    {
        $status = '';
        if($this->getIsAvailableAttribute()){
            $status = $this->getIsQuotaNotFulfilledAttribute() ? 'Available' : 'Full';
        }else{
            $status = 'Closed';
        }

        return $status;
    }

    public function getPriceStrAttribute()
    {
        return "Rp. ". number_format((int)$this->attributes['price'], 2, ',', '.');
    }

    public function getDurationAttribute()
    {
        $start_date = new DateTime($this->attributes['start_date']);
        $end_date = new DateTime($this->attributes['end_date']);
        return $end_date->diff($start_date)->format('%a');
    }

    // Setters
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = filter_var(str_replace(',00', '', $value), FILTER_SANITIZE_NUMBER_INT);;
    }

    // Relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
