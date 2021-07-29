<?php


namespace App\Library;


abstract class Controller
{
    protected $view;
    public abstract function index(): string;
}