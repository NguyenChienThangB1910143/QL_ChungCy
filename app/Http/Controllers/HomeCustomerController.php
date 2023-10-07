<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCustomerController extends Controller
{
    public function index()
    {
        $title = 'Trang Chủ';

        return view('homecustomer', compact('title'));
    }
}
