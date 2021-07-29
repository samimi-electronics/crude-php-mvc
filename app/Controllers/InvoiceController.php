<?php


namespace App\Controllers;


use App\Library\Controller;

class InvoiceController extends Controller
{
    protected $view;
    public function __construct($view)
    {
        $this->view = $view;
    }
    public function index(): string
    {
        return $this->view->index();
    }
    public function store()
    {
        return $this->view->store($_POST);
    }
}