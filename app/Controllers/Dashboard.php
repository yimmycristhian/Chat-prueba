<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        echo "Bienvenido al Dashboard, " . session()->get('username');
    }
}
