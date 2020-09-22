<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'food_id',
        'user_id',
        'quantity',
        'total',
        'status',
        'payment_url'
    ];

    public function food()
    {
        return $this->hasOne(Food::class,'id','food_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->timestamp;
    }
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])
            ->timestamp;
    }
}
