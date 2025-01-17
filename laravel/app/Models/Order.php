<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['order_number','status_id','clients_id'];

    public function cliente()
    {
        return $this->belongsTo(Client::class,'clients_id','id');
    }
}
