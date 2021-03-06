<?php
namespace App\Repositories;

class DateTimeProvider implements DateTimeProviderInterface {

    public function getCurrentDate() {
        return date('Y-m-d');
    }

    public function addDaysToToday(string $daysToAdd)
    {
        return Date('Y-m-d', strtotime('+' . $daysToAdd . ' days'));
    }

    public function subDaysFromToday($daysToSub)
    {
        return date('Y-m-d', strtotime('-' . $daysToSub . 'days'));
    }
   
    
}
