<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'user_id', 'path', 'original_name'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
