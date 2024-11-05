<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISSNPartner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'issn_partners';
}
