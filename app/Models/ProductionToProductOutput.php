<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionToProductOutput extends Model
{
    use HasFactory;
    public function ProductInfo() {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
