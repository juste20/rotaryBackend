<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'type', 'date', 'time', 'location', 'is_statutory'
    ];

    protected $casts = ['date' => 'date', 'time' => 'datetime:H:i'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
