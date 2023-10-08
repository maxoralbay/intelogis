<?php

namespace App\Classes;
abstract class DeliveryServiceFactory
{
    public abstract function createService($base_url);
}
