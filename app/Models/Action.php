<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'objectives', 'location', 'date', 'partners', 'axis'
    ];

    protected $casts = ['date' => 'datetime'];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
