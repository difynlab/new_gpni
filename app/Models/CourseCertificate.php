<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCertificate extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function purchase()
    {
        return $this->belongsTo(CoursePurchase::class, 'course_purchase_id', 'transaction_id');
    }
}
