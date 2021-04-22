@extends ('listemoisAdmin')
@section('contenu2')
<h3>Fiche de frais du mois {{ $numMois }}-{{ $numAnnee }} : 
    </h3>
    <div class="encadre">
    <p>
    Etat : <strong>{{ $libEtat }} depuis le {{ $dateModif }} </strong>
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
            <th> Total </th>
		</tr>
        @foreach($lesVisiteurs as $leVisiteur)
        <tr>
            <td>{{ $leVisiteur["nom"] }} </td>
            @foreach($lesFraisForfait as $unFraisForfait)
                @if($unFraisForfait['idVisiteur'] == $leVisiteur['id'])
                    <td class="qteForfait">{{ $unFraisForfait['montantTotal'] }} 
                    </td>
                @endif
            @endforeach
            <td>{{  $prixDuMois[$leVisiteur['id']]  }}</td>
		</tr>
        @endforeach
    </table>
  	</div>

    <form action="{{ route('chemin_affichagePdfAdmin') }}" method="post">
    $v = $vue
    <input id="ok" type="submit" value="PDF" size="20" />
    </form>
@endsection