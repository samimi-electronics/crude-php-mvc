<?php


namespace App\Library\Exceptions;


class RouteNotFoundException extends \Exception
{
    protected $message = '404 not found';
}