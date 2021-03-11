<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
