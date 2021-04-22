<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
use App\Post;
use PDF;
class etatFraisController extends Controller
{
    function selectionnerMois(Request $request){
        if(session('visiteur') != null){
            $visiteur = session('visiteur');
            $idVisiteur = $visiteur['id'];
            $lesMois = PdoGsb::getLesMoisDisponibles($idVisiteur);
            $lesVisiteurs = PdoGsb::getLesVisiteurs();
		    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
		    // on demande toutes les clés, et on prend la première,
		    // les mois étant triés décroissants
            $lesCles = array_keys( $lesMois );
            $moisASelectionner = $lesCles[0];
            return view('listemois')
                        ->with('leMois', $moisASelectionner)
                        ->with('visiteur',$visiteur)
                        ->with('lesMois',$lesMois)
                        ->with('lesVisiteurs',$lesVisiteurs);
        }
        else{
            return view('connexion')->with('erreurs',null);
        }

    }

    function voirFrais(Request $request){
        if( session('visiteur')!= null){
            //
            $lesVisiteurs = PdoGsb::getLesVisiteurs();
            //
            $visiteur = session('visiteur');
            $idVisiteur = $request['listeVstr'];
            $leMois = $request['lstMois']; 
		    $lesMois = PdoGsb::getTousLesMoisDisponibles();
            $lesFraisForfait = PdoGsb::getTousLesFraisForfait($leMois);
            $lesInfosFicheFrais = PdoGsb::getLesInfosFicheFrais($idVisiteur,$leMois);
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
                    ->with('lesVisiteurs', $lesVisiteurs)
                    ->with('lesFraisForfait',$lesFraisForfait)
                    ->with('visiteur',$visiteur);
            return $vue;
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
    }

    public function getPostPdf (){
    // L'instance PDF avec une vue : resources/views/posts/show.blade.php

    $pdf = PDF::loadView('modeles.visiteur');
    return $pdf->stream();

    }

}