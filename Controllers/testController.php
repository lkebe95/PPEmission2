<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class testController extends Controller
{
    function tester(){
        $visiteur = session('visiteur');
        $message = "OK";
        return view('pageTest')->with("message",$message)
                               ->with("visiteur",$visiteur);
    }
}