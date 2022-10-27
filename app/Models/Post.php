<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        // Asa
    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
