<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DB;
use App\Models\OrderTime;
use App\Providers\DeliveryEstimatorInterface;
use Illuminate\Http\Request;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\DateTimeProviderInterface;


class OrderTimeController extends Controller
{
    
    protected $orders;
    protected $dateTimeProvider;
    protected $deliveryEstimator;

    /**
     * PostController constructor.
     *
     * @param OrderRepositoryInterface $orders
     */
    public function __construct(OrderRepositoryInterface $orders, DateTimeProviderInterface $dateProvider
    , DeliveryEstimatorInterface $deliveryProvider)
    {
        $this->orders = $orders;
        $this->dateTimeProvider = $dateProvider;
        $this->deliveryEstimator = $deliveryProvider;
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
        $monthrange = request('monthrange');
        $currentdate = $this->dateTimeProvider->getCurrentDate();
        $previousmonth = $this->dateTimeProvider->subDaysFromToday($monthrange);
        try {
            if ($range != null) 
            {
                $deliveries = $this -> orders->getOrderByZipAndRange($postZipCode, $range, $range2);
                $estimatedDeliveryInDays = $this->deliveryEstimator->CalculateDelivery($deliveries);  
            }
            else 
            {
            if ($monthrange == '30'){
                $deliveries = $this -> orders->getOrderByZipAndRange($postZipCode, $previousmonth, $currentdate);
                $estimatedDeliveryInDays = $this->deliveryEstimator->CalculateDelivery($deliveries);  
            }
            if ($monthrange == '90'){
                $deliveries = $this ->orders->getOrderByZipAndRange($postZipCode, $previousmonth, $currentdate);
                $estimatedDeliveryInDays = $this->deliveryEstimator->CalculateDelivery($deliveries);  
            }
            
            if ($monthrange == '0') 
            {
                $deliveries = $this -> orders->getOrderByZip($postZipCode);
                $estimatedDeliveryInDays = $this->deliveryEstimator->CalculateDelivery($deliveries);  
            }
            }  
                        
            $deliveryDate = $this->dateTimeProvider->addDaysToToday($estimatedDeliveryInDays);
            $daysToAdd = $this->deliveryEstimator->GetDaysToAdd($deliveryDate);
            $estimatedDeliveryInDays = $estimatedDeliveryInDays + $daysToAdd;
            return view('shipment',['data' =>$estimatedDeliveryInDays]);
        }
        catch (\Exception $e) {
            // todo: handle better error
            return abort(500, "Unexpected error occured");
        }
    }
}
