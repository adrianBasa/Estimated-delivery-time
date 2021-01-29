<?php
namespace Tests;
use RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\DeliveryEstimator;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
  /** @test */

  public function testCalculateDelivery()
 {   $deliveries = [14,5,6,7];
     $estimator = new DeliveryEstimator();
     $estimatedDelivery = $estimator->CalculateDelivery($deliveries);    
     $this->assertTrue($estimatedDelivery ==8);   
     

 }
}

