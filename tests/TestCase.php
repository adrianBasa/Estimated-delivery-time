<?php
namespace Tests;
use RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\DeliveryEstimator;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
  /** @test */

    public function TestCalculateDeliveryReturnsExpectedValue()
    {   
        $deliveries = [14,5,6,7];
        $estimator = new DeliveryEstimator();
        $estimatedDelivery = $estimator->CalculateDelivery($deliveries);    
        $this->assertTrue($estimatedDelivery == 8);   
    }
/** @test */
    public function TestCalculateDeliveryReturnsNullWhenEmpty()
    {   
        $deliveries = [];
        $estimator = new DeliveryEstimator();
        $estimatedDelivery = $estimator->CalculateDelivery($deliveries);    
        $this->assertTrue($estimatedDelivery == -1);   
    } 
}

