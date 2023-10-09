<?php namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\DeliveryResult;
use App\Services\DeliveryService;
use App\Models\Shipment;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    protected $deliveryService;

    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    /***
     *
     * @param
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function calculateFastDelivery()
    {
        try {
            request()->validate([
                'sourceKladr' => 'required',
                'targetKladr' => 'required',
                'weight' => 'required'
            ]);
            $result = $this->deliveryService->calculateFastDelivery(request()->all());
            \Log::info('calculateFastDelivery', $result);
            $shipment =Shipment::create([
                'sourceKladr' => $result['sourceKladr'],
                'targetKladr' => $result['targetKladr'],
                'weight' => $result['weight']
            ]);
            DeliveryResult::create([
                'shipment_id' => $shipment->id,
                'service_type' => 'fast',
                'price' => $result['price'],
                'delivery_date' => $result['delivery_date']
            ]);
            $result = [
                'price' => $result['price'],
                'date' => $result['delivery_date'],
                'error' => null
            ];
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }

    /***
     * @param
     * @return \Illuminate\Http\JsonResponse
     */
     public function calculateSlowDelivery()
    {
        try {
            request()->validate([
                'sourceKladr' => 'required',
                'targetKladr' => 'required',
                'weight' => 'required'
            ]);
            \Log::info('calculateSlowDeliverySlow', request()->all());
            $result = $this->deliveryService->calculateSlowDelivery(request()->all());
            \Log::info(['calculateFastDeliverySlow', print_r($result, true)]);
            $shipment =Shipment::create([
                'sourceKladr' => $result['sourceKladr'],
                'targetKladr' => $result['targetKladr'],
                'weight' => $result['weight']
            ]);
            DeliveryResult::create([
                'shipment_id' => $shipment->id,
                'service_type' => 'slow',
                'price' => $result['price'],
                'delivery_date' => $result['delivery_date'],
            ]);
            $result = [
                'price' => $result['price'],
                'date' => $result['delivery_date'],
                'error' => null
            ];
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}
