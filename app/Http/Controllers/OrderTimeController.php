<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DB;
use App\Models\DeliveryEstimator;
use App\Models\OrderTime;
use Illuminate\Http\Request;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\DateTimeProviderInterface;


class OrderTimeController extends Controller
{
    
    protected $orders;
    protected $dateTimeProvider;

    /**
     * PostController constructor.
     *
     * @param OrderRepositoryInterface $orders
     */
    public function __construct(OrderRepositoryInterface $orders, DateTimeProviderInterface $dateProvider)
    {
        $this->orders = $orders;
        $this->dateTimeProvider = $dateProvider;
    }

    public function getall()
    { 
       return view('welcome');
    }

    public function getzipcode()
    {
        $postZipCode = request('postZipCode');
        $range = request('range');
        $range2 = request('range2');
        $estimator = new DeliveryEstimator();
            
        if($range != null) 
        {
            $deliveries = $this -> orders->getOrderByZipAndRange($postZipCode, $range, $range2);
            $estimatedDeliveryInDays = $estimator->CalculateDelivery($deliveries);  
        }
        else 
        {
            $deliveries = $this -> orders->getOrderByZip($postZipCode);
            $estimatedDeliveryInDays = $estimator->CalculateDelivery($deliveries);  
        }
        $deliveryDate = $this->dateTimeProvider->addDaysToToday($estimatedDeliveryInDays);
        $daysToAdd = $this->getDaysToAdd($deliveryDate);
        $estimatedDeliveryInDays = $estimatedDeliveryInDays + $daysToAdd;

        return view('shipment',['data' =>$estimatedDeliveryInDays]);

    }

    public function getDaysToAdd(string $deliveryDate)
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
