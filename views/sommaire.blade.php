@extends ('modeles/visiteur')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
               @if(!$visiteur["admin"])
                  <li >STATUT : Visiteur</li>
                @else
                  <li >STATUT : Gestionnaire</li>
                @endif

                  <li >
                    <strong>Bonjour {{ $visiteur['nom'] . ' ' . $visiteur['prenom'] }}</strong>
                      
                  </li>
                  <li class="smenu">
                     <a href="{{ route('chemin_gestionFrais')}}" title="Saisie fiche de frais ">Saisie fiche de frais</a>
                  </li>
                  @if(!$visiteur["admin"])
                  <li class="smenu">
                    <a href="{{ route('chemin_selectionMois') }}" title="Consultation de mes fiches de frais">Etat de tous les frais</a>
                  </li>
                  @else
                  <li class="smenu">
                    <a href="{{ route('chemin_selectionMoisAdmin') }}" title="Consultation des frais visiteurs">Etat de leurs frais</a>
                  </li>
                  @endif
                  <li class="smenu">
                    <a href="{{ route('chemin_choixMdp') }}" title="Changement mot de passe">Changer mon mot de passe</a>
                  </li>
               <li class="smenu">
                <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection          