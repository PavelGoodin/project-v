<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodImage extends Model
{
    use HasFactory;
    protected $table = 'good_images';
    protected $guarded = [];
}