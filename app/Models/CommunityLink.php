<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link',
        'channel_id',
        'user_id',
        'approved'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}


// ¿Qué problema de seguridad representa esto?
// Que el usuario podria ponerse en cualquer canal y tener cualquier id 

