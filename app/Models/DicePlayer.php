<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DicePlayer extends Model
{
    use HasFactory;
    protected $table = 'table_use_dices_master';
    protected $guarded = [];

}