<?php

namespace App\Models;

class Shipment
{
    protected $fillable = [
        'sourceKladr',
        'targetKladr',
        'weight',
        'base_url', // Add the base_url field if it's relevant for shipments
    ];
    public $base_url;
    public function deliveryResults()
    {
        return $this->hasMany(DeliveryResult::class);
    }
}
