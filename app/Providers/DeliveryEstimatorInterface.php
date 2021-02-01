<?php 
namespace App\Providers;

interface DeliveryEstimatorInterface 
{
    public function CalculateDelivery(Array $previousDeliveries);
   
    public function GetDaysToAdd(string $deliveryDate);
}
