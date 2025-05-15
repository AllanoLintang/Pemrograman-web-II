<?php

namespace App\Controllers;
use App\Models\Praktikan;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new Praktikan();
        $data = $model->getData();
        return view('layout/navbar')
        . view('home', $data);
    }
}
