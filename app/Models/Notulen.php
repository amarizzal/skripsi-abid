<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_id',
        'file',
        'content'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
