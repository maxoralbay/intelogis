<?php

namespace App\Models;

class DeliveryResult
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
