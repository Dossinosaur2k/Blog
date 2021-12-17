<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $tableName = 'posts';

    protected $fillable = ['id','id_u','name','title','content','image_path','category_id'];

    protected $visible = ['id','id_u','name','title','content','image_path','created_at','category_id'];

    public function category()
    {
       return  $this->belongsTo(category::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comments::class, 'id_post','id');
    }
}
