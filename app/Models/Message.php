<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['sender', 'receiver', 'message'];
    public function user()
    {
        return $this->belongsTo(User::class, 'sender', 'id');
    }
    protected static function booted()
    {
        static::creating(function ($message) {
            $message->sender = auth()->id();
        });
    }
}
