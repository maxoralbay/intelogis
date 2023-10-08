<?php

namespace App\Factories;

use App\Classes\DeliveryServiceFactory;
use App\Services\FastDeliveryService;
class FastDeliveryServiceFactory extends DeliveryServiceFactory
{
    public function createService($base_url): FastDeliveryService
    {
        // TODO: Implement createService() method.
        return new FastDeliveryService($base_url);
    }
}
