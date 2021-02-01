<?php 
namespace App\Providers;

class DeliveryEstimator implements DeliveryEstimatorInterface
{
  
    public function CalculateDelivery(Array $previousDeliveries) 
    {
        if ($previousDeliveries==!null) {
            $a = array_filter($previousDeliveries);
            $average = array_sum($a)/count($a); 
            return $average; 
        }

        return -1;
       
    }

    public function GetDaysToAdd(string $deliveryDate)
    {
        $dayOfWeek = date('w', strtotime($deliveryDate));
        $adjustedDelivery = 0;
        if($dayOfWeek == 0) {
            $adjustedDelivery = 1;    
        }
        if($dayOfWeek == 6)
        {
            $adjustedDelivery = 2;
        }

        return $adjustedDelivery;
    }
}