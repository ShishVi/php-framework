<?php

namespace App\Controllers;

class HomeController
{

    public function index()
    {
        return view('home', ['product' => 'apple', 'store' => 'LabNew555']);

    }
}