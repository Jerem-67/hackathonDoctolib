<?php

namespace App\Security;


class CalculDateVaccin
{
    public function calculDate()
    {
        $dateInterval = date_interval_create_from_date_string('10 days');
        $date = new \DateTime('2000-01-01');
        $date->add(new \DateInterval($dateInterval));
        dump($date);
        die();
    }
}