<?php
namespace App\Repositories;

interface OrderRepositoryInterface
{   /**
    * Get's orders by zip code
    *
    * @param string
    */
    public function getOrderByZip($zip_code);

    /**
    * Get's orders by zip code
    *
    * @param string
    * @param string
    * @param string
    */
    public function getOrderByZipAndRange($zip_code, $start, $end);
}