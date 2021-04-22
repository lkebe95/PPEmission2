@extends ('sommaire')
@section('contenu1')
      <div id="contenu">
        <h2>Changer le mot de passe</h2>
      <form action="" method="post">
      {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm"><p>
          Date d'embauche(aaaa-mm-jj):
          <input type="text" name="dateSaisie" size="8" /> </br>
          Nouveau mot de passe
          <input type="password" name="mdp2" size="8"  /> </br>
          Retaper mot de passe
          <input type="password" name="mdp2" size="8"  /> </br>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </p> 
        </div>
          
        </form>
@endsection