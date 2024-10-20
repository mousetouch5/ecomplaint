<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'user_id',
        'updates',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


