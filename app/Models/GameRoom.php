<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameRoom extends Model
{
    use HasFactory;
    protected $table = 'start_games';
    protected $guarded = [];

}