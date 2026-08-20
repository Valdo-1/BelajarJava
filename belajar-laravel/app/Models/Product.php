<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;  // ← INI YANG KETINGGALAN

    protected $fillable = ['name', 'price', 'description', 'category_id', 'photo'];

    // Many to one
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}