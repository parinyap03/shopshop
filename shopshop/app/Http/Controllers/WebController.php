<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function myshop()
    {
        $name = "test test";
        $phone = "09-8888-8888";
        $address = "ขอนแก่น";
        return view('myshop',[
            'name' => $name,
            'phone' => $phone,
            'address' => $address
        ]);
    }
}
