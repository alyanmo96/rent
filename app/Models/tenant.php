<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenant extends Model
{
    use HasFactory;
    protected $table = 'tenant';
    protected $fillable = ['description','area','post_id','showToAdmin'];
}
