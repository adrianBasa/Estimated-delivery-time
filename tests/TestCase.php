<?php
namespace Tests;
use RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Providers\DeliveryEstimator;
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

    /** @test */
    public function TestGetDaysToAddReturnsZeroWhenWeekDay()
    {   
        $estimator = new DeliveryEstimator();
        $daysToAdd = $estimator->GetDaysToAdd(date('2021-02-01'));    
        $this->assertTrue($daysToAdd == 0);   
    }

    /** @test */
    public function TestGetDaysToAddReturnsOneWhenSunday()
    {   
        $estimator = new DeliveryEstimator();
        $daysToAdd = $estimator->GetDaysToAdd(date('2021-01-31'));    
        $this->assertTrue($daysToAdd == 1);   
    }

    /** @test */
    public function TestGetDaysToAddReturnsTwoWhenSaturday()
    {   
        $estimator = new DeliveryEstimator();
        $daysToAdd = $estimator->GetDaysToAdd(date('2021-01-30'));    
        $this->assertTrue($daysToAdd == 2);   
    }
}

