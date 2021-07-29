<?php


namespace App\Views;


class Invoice
{
    public function index(): string
    {
        return '
            <form action="/invoice" method="POST">
                <label for="amount">Amount</label><br>
                <input type="text" name="amount">
                <button type="submit">Submit</button>
            </form>
        ';
    }
    public function store($result): string
    {
        $resultJson = json_encode($result);
        return "<pre>{$resultJson}</pre>";
    }
}