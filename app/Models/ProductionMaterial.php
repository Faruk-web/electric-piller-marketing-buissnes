<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionMaterial extends Model
{
    use HasFactory;
    public function MaterialInfo() {
        return $this->belongsTo(Material::class, 'raw_material_id','id');
    }
}
