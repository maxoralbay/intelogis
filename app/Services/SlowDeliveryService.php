<?php namespace App\Services;

class SlowDeliveryService
{
    public function calculateDelivery($shipment)
    {
        // Extract input values
        $sourceKladr = $shipment->sourceKladr;
        $targetKladr = $shipment->targetKladr;
        $weight = $shipment->weight;

        // Calculate price coefficient
        $basePrice = 150.0; // Base price for "Slow" delivery
        $coefficient = 1.1; // Some coefficient, adjust as needed
        $price = $basePrice * $coefficient;

        // Calculate delivery date
        $currentDate = now();
        $deliveryDate = $currentDate->addDays(7); // Delivery in 7 days

        // Return the result in the specified format
        return [
            'coefficient' => $coefficient,
            'date' => $deliveryDate->toDateString(),
            'error' => null, // No error
        ];
    }
}
