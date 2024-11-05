<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISSNPartnerContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'issn_partner_contents';
}
