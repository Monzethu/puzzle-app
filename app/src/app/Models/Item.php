<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'explanation',
        'serial_number',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_item');
    }
}

