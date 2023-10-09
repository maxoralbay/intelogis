<?php namespace App\Services;

use App\Models\Shipment;
use App\Models\DeliveryResult;
use App\Factories\FastDeliveryServiceFactory;
use App\Factories\SlowDeliveryServiceFactory;

class DeliveryService
{
    public function calculateFastDelivery($shipment)
    {
        \Log::info('calculateFastDelivery', $shipment);
        $factory = new FastDeliveryServiceFactory();
        $service = $factory->createService($shipment);

       return  $service->calculateDelivery($shipment);


    }

    public function calculateSlowDelivery($shipment)
    {
        \Log::info('calculateSlowDelivery', $shipment);
        $factory = new SlowDeliveryServiceFactory();
        $service = $factory->createService($shipment);

        return  $service->calculateDelivery($shipment);
    }
}
