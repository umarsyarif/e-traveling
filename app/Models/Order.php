<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['travel_id', 'is_accepted', 'testimoni'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'status'
    ];

    // Relations
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Getters
    public function getStatusAttribute()
    {
        return $this->attributes['is_accepted'] ? 'Accepted' : 'Pending';
    }

    // Setters
    public function setIsAcceptedAttribute($value)
    {
        if($value){
            $this->attributes['accepted_at'] = now();
            $this->attributes['accepted_by'] = Auth::user()->id;
        }
        $this->attributes['is_accepted'] = $value;
    }
}
