<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // Define the fields that can be mass assigned
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'age',
        'sex',
        'civil_status',
        'complaint',
        'uploaded_file', // This should match the database column name
    ];

    // Optionally cast 'uploaded_file' as an array
    protected $casts = [
        'uploaded_file' => 'array',
    ];
}
