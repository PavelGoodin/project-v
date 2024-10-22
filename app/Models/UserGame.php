<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserGame extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'users_games';
    protected $guarded = [];
    
    
    //Связи
        public function chats()
    {
        return $this->hasMany(Chat::class,'user_id');
    }
    
    public function user():BelongsTo
    {
        return $this->belongsTo( User::class, 'user_web_id' );
    }

}