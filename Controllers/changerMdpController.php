<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class changerMdpController extends Controller
{
    function choixMdp(Request $request){
        $visiteur = session('visiteur');
        return view('choixNvxMdp')->with("visiteur",$visiteur); 
    }
    
    function changerMdp(Request $request){
        dd($request['mdp1']);
        if(session('visiteur') != null){
            $visiteur = session('visiteur');
            $mdp1=$request['mdp1'];
            $mdp2=$request['mdp2'];
            $dateSaisie=$request['dateSaisie'];
            $dEmb=PdoGsb::extraireDateEmb($visiteur['id']);
            if($dateSaisie == $dEmb[0]){
                if($mdp1 == $mdp2){
                    dd($dEmb);
                    return view('changerMdp')->with("visiteur",$visiteur); 
                }
            }
        }
    }
    
}