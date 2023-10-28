<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_user_model extends Model
{
    use HasFactory;

    protected $fillablev = [
        'name',
        'email',
        'password'
    ];
}
