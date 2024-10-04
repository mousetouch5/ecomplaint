<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

     // Define the table name if it's different from 'complaints'
    // protected $table = 'complaints';

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
        'uploaded_files', // This is for file uploads (as JSON)
    ];

    // Optionally cast 'uploaded_files' as an array
    protected $casts = [
        'uploaded_files' => 'array',
    ];



}
