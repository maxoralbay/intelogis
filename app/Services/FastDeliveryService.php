<?php namespace App\Services;

class FastDeliveryService
{
    public function calculateDelivery($shipment)
    {
        // Extract input values
        $sourceKladr = $shipment->sourceKladr;
        $targetKladr = $shipment->targetKladr;
        $weight = $shipment->weight;

        // Calculate price
        $basePrice = 50.0; // Base price for "Fast" delivery
        $price = $basePrice + ($weight * 2); // Adjust the price based on weight

        // Calculate delivery date
        $currentDate = now();
        $deliveryDate = $currentDate->addDays(2); // Delivery in 2 days

        // Check if it's past 18:00, if so, add one more day for delivery
        if ($currentDate->hour >= 18) {
            $deliveryDate->addDay();
        }

        // Return the result in the specified format
        return [
            'price' => $price,
            'period' => 2, // 2 days
            'error' => null, // No error
        ];
    }
}
