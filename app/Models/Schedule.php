<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'content',
        'place',
        'dresscode',
        'file',
        'disposition',
        'access_level',
        'audience',
        'description',
        'ket_dispo'
    ];
}
