<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'images',
        'imagess',
        'location',
    ];

    public function user()
    { 
        return $this->belongsTo(User::class); 
    }
}
