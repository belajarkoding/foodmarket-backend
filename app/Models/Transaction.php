<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function food()
    {
        return $this->hasOne(Food::class,'id','food_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
