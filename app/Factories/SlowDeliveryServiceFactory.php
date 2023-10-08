<?php

namespace App\Factories;

use App\Classes\DeliveryServiceFactory;
use App\Services\SlowDeliveryService;

class SlowDeliveryServiceFactory extends DeliveryServiceFactory
{
    public function createService($base_url): SlowDeliveryService
    {
        // TODO: Implement createService() method.
        return new SlowDeliveryService($base_url);
    }
}
