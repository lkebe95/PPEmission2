@extends ('listemois')
@section('contenu2')

<h3>Fiche de frais du mois {{ $numMois }}-{{ $numAnnee }} {{ totalll }}: 
    </h3>
    <div class="encadre">
    <p>
    Etat : <strong>{{ $libEtat }}   depuis le {{ $dateModif }} </strong>
         <br> Montant validé : <strong>{{ $montantValide }} </strong>
     </p>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
            <th>Visiteur</th>
            <th> Fofait Etape</th>
            <th> Frais Kilométrique </th>
            <th> Nuitée Hotel</th>
            <th> Repas Restaurant </th>
		</tr>
        <tr>
        @foreach($lesVisiteurs as $leVisiteur)
        <td>{{ $leVisiteur["nom"] }} </td>
            @foreach($lesFraisForfait as $unFraisForfait)
                @if($unFraisForfait['idVisiteur'] == $leVisiteur['id'])
                    <td class="qteForfait">{{ $unFraisForfait['montantTotal'] }} 
                    </td>
                @endif
            @endforeach
		</tr>
        @endforeach
    </table>
  	</div>
    
    <form method = 'get' action="{{ route('chemin_affichagePdf') }}">
        <input id="ok" type="submit" value="PDF" size="20" />
    </form>
@endsection