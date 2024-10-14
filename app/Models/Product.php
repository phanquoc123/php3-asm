<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable=[
        'name',
        'image',
        'price',
        'remaining_quantity',
        'description',
        'category_id',
        
    ];

    
    public function category(){
        return $this->belongsTo(Category::class);
    }
 
}
