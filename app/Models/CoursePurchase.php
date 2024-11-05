<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePurchase extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'course_purchases';

    public function certificate()
    {
        return $this->hasOne(CourseCertificate::class, 'course_purchase_id', 'transaction_id');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'id');
    }
}
