<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'planet_chat';
    protected $guarded = [];
    
    public function usergame()
{
    return $this->belongsTo(UserGame::class, 'user_id');
}

}
