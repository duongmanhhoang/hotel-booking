<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'room_id',
        'name',
    ];

    public function room()
    {
        $this->belongsTo(Room::class);
    }
}
