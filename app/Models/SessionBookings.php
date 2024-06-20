<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionBookings extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function trainer()
    {
        return $this->belongsTo(User::class,'trainer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class,'trainer_skill_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'session_booking_id');
    }
}
