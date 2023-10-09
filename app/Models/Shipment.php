<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
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
