<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class product extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

}
