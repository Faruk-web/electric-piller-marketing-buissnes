<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;
    public function senderSupplierInfo() {
        return $this->belongsTo(Supplier::class, 'supplier_id','id');
    }
}
