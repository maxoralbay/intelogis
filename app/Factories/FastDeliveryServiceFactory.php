<?php

namespace App\Factories;

use App\Classes\DeliveryServiceFactory;
use App\Services\FastDeliveryService;
class FastDeliveryServiceFactory extends DeliveryServiceFactory
{
    public function createService($shipment): FastDeliveryService
    {
        // TODO: Implement createService() method.
        return new FastDeliveryService($shipment);
    }
}
