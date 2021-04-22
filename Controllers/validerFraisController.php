<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class validerFraisController extends Controller
{
    function selectionMois(Request $request)
    {
        if(!session('comptable') == null){
            $comptable = session('comptable');
            //$idComptable = $comptable['id'];
            $lesMois = PdoGsb::getMois();
		    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
		    // on demande toutes les clés, et on prend la première,
		    // les mois étant triés décroissants
		    $lesCles = array_keys( $lesMois );
            $moisASelectionner = $lesCles[0];
            $lesVisiteurs=PdoGsb::getLesVisiteurs();
            return view('listemoisCmpt')
                        ->with('lesMois', $lesMois)
                        ->with('leMois', $moisASelectionner)
                        ->with('lesVisiteurs',$lesVisiteurs);
        }
        else{
            return view('connexion')->with('erreurs',null);
        }

    }

    function regarderFrais(Request $request)
    {
        if( session('visiteur')== null){
            $leMois = $request['lstMois']; 
		    $lesMois = PdoGsb::getMois();
            $lesFraisForfait = PdoGsb::getTousLesFraisForfait($leMois);
            $lesInfosFicheFrais = PdoGsb::getToutesLesInfosFicheFrais($leMois);
		    $numAnnee = MyDate::extraireAnnee( $leMois);
		    $numMois = MyDate::extraireMois( $leMois);
		    $libEtat = $lesInfosFicheFrais['libEtat'];
		    $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif =  $lesInfosFicheFrais['dateModif'];
            $dateModifFr = MyDate::getFormatFrançais($dateModif);
            $vue = view('listefrais')->with('lesMois', $lesMois)
                    ->with('leMois', $leMois)->with('numAnnee',$numAnnee)
                    ->with('numMois',$numMois)->with('libEtat',$libEtat)
                    ->with('montantValide',$montantValide)
                    ->with('nbJustificatifs',$nbJustificatifs)
                    ->with('dateModif',$dateModifFr)
                    ->with('lesFraisForfait',$lesFraisForfait);
            return $vue;
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
    }
}