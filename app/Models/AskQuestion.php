<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $table = 'ask_questions';

    protected $fillable = [
        'user_id',
        'subject',
        'initial_message',
        'date',
        'time',
        'is_viewed',
        'status',
    ];
}
