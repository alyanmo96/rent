<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_post extends Model
{
    use HasFactory;
    protected $table = 'rent_post';
    protected $fillable = ['name','phone','area','build_type','parking','rooms','description','post_id','showToAdmin'];
}
