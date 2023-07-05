<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['supplier_id','product_id'];

    public function producto()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class,'id','supplier_id');
    }
}
