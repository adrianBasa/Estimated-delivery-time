<?php
namespace App\Repositories;
use App\Models\OrderTime;

class OrderRepository implements OrderRepositoryInterface 
{
    /**
    * Get's orders by zip code
    *
    * @param string
    */
    public function getOrderByZip($zip_code)
    {
        return OrderTime::select(\DB::raw("DATEDIFF(delivered_date, shipment_date ) AS day_diff"))
        ->where('zip_code', $zip_code )->pluck('day_diff')->toArray();
    }

      /**
    * Get's orders by zip code
    *
    * @param string
    *@param string
    *@param string
    */
    public function getOrderByZipAndRange($zip_code,$start,$end)
    {
        return OrderTime::select(\DB::raw("DATEDIFF(delivered_date, shipment_date ) AS day_diff"))
        ->where('zip_code', $zip_code )->WhereBetween('shipment_date', [$start, $end])->pluck('day_diff')->toArray();
    }
}