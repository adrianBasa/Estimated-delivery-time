<?php
namespace App\Repositories;

interface DateTimeProviderInterface
{  
   
    public function getCurrentDate();

    public function addDaysToToday(string $daysToAdd);

    public function subDaysFromToday($daysToSub);
}