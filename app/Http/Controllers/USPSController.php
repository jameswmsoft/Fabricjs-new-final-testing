<?php

namespace usps\Http\Controllers;
use usps\Http\Controllers\Controller;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Request;
use Usps;

class USPSController extends Controller
{
    public function index() {
        return response()->json(
            Usps::validate( 
                Request::input('Address'), 
                Request::input('Zip'), 
                Request::input('Apartment'), 
                Request::input('City'), 
                Request::input('State')
            )
        );

    }
}