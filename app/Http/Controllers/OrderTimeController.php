<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DB;
use App\Models\DeliveryEstimator;
use App\Models\OrderTime;
use Illuminate\Http\Request;

class OrderTimeController extends Controller
{
    
    public function getall()
    { 
       return view('welcome');
    }

    public function getzipcode()
    {
        $postZipCode = request('postZipCode');

        $deliveries = OrderTime::select(\DB::raw("DATEDIFF(delivered_date, shipment_date ) AS day_diff"))->where('zip_code', $postZipCode)->pluck('day_diff')->toArray();;
        $estimator = new DeliveryEstimator();
        $estimatedDelivery = $estimator->CalculateDelivery($deliveries);       
        return view('shipment',['data' =>$estimatedDelivery]);

    }

}
