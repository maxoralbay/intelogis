<?php namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Services\DeliveryService;
use App\Models\Shipment;

class DeliveryController extends Controller
{
    protected $deliveryService;

    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    /***
     *
     * @param Shipment $shipment
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function calculateFastDelivery(Shipment $shipment)
    {
        $result = $this->deliveryService->calculateFastDelivery($shipment);
        DeliveryResult::create([
            'shipment_id' => $shipment->id,
            'service_type' => 'fast',
            'price' => $result->price,
            'delivery_date' => $result->date,
            'error' => $result->error
        ]);
        return response()->json($result);
    }

    /***
     * @param Shipment $shipment
     * @return \Illuminate\Http\JsonResponse
     */
     public function calculateSlowDelivery(Shipment $shipment)
    {
        $result = $this->deliveryService->calculateSlowDelivery($shipment);

        // Save the delivery result to the database
        DeliveryResult::create([
            'shipment_id' => $shipment->id,
            'service_type' => 'slow',
            'price' => $result['price'],
            'delivery_date' => $result['date'],
            'error' => $result['error'],
        ]);

        // Return the result to the user
        return response()->json($result);
    }

}
