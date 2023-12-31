<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;
    public function ProductAdditionalImage()
    {
        return $this->hasMany(ProductAdditionalImage::class, 'parent_id', 'id');
    }
}
