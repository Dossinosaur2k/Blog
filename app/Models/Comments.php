<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_post','author','body'];

    protected $visible = ['id','id_post','author','body','created_at','updated_at'];
}
