<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialInfoToMakeProduct extends Model
{
    use HasFactory;
    public function MaterialInfo() {
        return $this->belongsTo(Material::class, 'material_id','id');
    }

    public function ProductInfo() {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
    
}
