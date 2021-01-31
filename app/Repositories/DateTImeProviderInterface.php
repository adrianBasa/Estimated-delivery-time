<?php
namespace App\Repositories;

interface DateTimeProviderInterface
{  
   
    public function getCurrentDate();

    public function addDaysToToday(string $daysToAdd);
}