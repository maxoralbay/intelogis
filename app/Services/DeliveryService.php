<?php namespace App\Services;

use App\Models\Shipment;
use App\Models\DeliveryResult;
use App\Factories\FastDeliveryServiceFactory;
use App\Factories\SlowDeliveryServiceFactory;

class DeliveryService
{
    public function calculateFastDelivery($shipment)
    {
        $factory = new FastDeliveryServiceFactory();
        $service = $factory->createService($shipment->base_url);

       return  $service->calculateDelivery($shipment);


    }

    public function calculateSlowDelivery($shipment)
    {
        $factory = new SlowDeliveryServiceFactory();
        $service = $factory->createService($shipment->base_url);

        return  $service->calculateDelivery($shipment);


    }
}
