<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskQuestionReply extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $table = 'ask_question_replies';

    protected $fillable = [
        'ask_question_id',
        'replied_by',
        'replied_by_name',
        'message',
        'date',
        'time',
        'is_viewed',
        'status',
    ];
}
