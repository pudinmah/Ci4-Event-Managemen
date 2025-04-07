<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'menu' => 'Home',
            'submenu' => 'Home Page',
            'title' => 'yukGawe',
        ];
        return view('home', $data);
    }
}
