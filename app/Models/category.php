<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $tableName = 'categories';

    protected $fillable = ['name'];

    protected $visible = ['id','name'];

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
}
