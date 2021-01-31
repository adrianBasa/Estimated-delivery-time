<?php 
namespace App\Models;

class DeliveryEstimator
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
}