<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterialStock extends Model
{
    use HasFactory;
    public function MaterialInfo() {
        return $this->belongsTo(Material::class, 'material_id','id');
    }
}
