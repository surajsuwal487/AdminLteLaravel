<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id', 'price', 'description'];

    public function catWithProduct()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
