<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductAdditionalImage extends Model
{
    use HasFactory;

    protected $table = 'product_image';
    public $timestamps = false;

    public function Product()
    {
        return $this->belongsTo(Product::class, 'parent_id', 'id');
    }
}
