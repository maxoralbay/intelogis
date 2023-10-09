<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DeliveryResult extends Model
{
    protected $fillable = [
        'shipment_id',
        'service_type',
        'price',
        'delivery_date',
        'error',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
