@extends('archives.index')

@section('archive')

  <div class="col-xs-12"><br></div>
      <!--formulaire de profile d'un secretaire-->
  <div class="col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12" style="border:solid;background-color:#8cb8e2;">
  <div class="col-sm-12 col-xs-0"><br><br></div>

	  <div class="col-xs-12">
	  	<img src="{{url('img/secretaires/'.$secretaire->image)}}" class="img img-circle" style="width: 50%;">
	  </div>

	  <div class="col-xs-12">
	    <h2> {{$secretaire->nom}} {{$secretaire->prenom}}</h2>
	    <br><hr>
	  </div>

	  <div class="col-xs-12" style="background-color:#fff">
	  	<table class="table table-striped table-hover col-xs-12">
	  	  <tr></tr>
	  		<tr><th class="col-xs-2">Nom: </th><td class="col-xs-6">{{$secretaire->nom}}</td></tr>
	  		<tr><th>Prénom: </th><td>{{$secretaire->prenom}}</td></tr>
	  		<tr><th>Date de naissance: </th><td>{{$secretaire->datNai}}</td></tr>
	  		<tr><th>Telf: </th><td>{{$secretaire->tlf}}</td></tr>
        <tr><th>Groupe sanguine: </th><td>{{$secretaire->song}}</td></tr>
	  		<tr><th>Adresse: </th><td>{{$secretaire->adresse}}</td></tr>
	  		<tr><th>Email: </th><td>{{$secretaire->email}}</td></tr>
	  		<tr><th>Sexe: </th><td>{{$secretaire->sexe}}</td></tr>
	  	</table>
	  </div>

       @if(Auth::user()->admin == "oui")
	  <div class="col-xs-12">
          
          <!--button pour modefier un infermier-->
      <div class="col-sm-offset-2 col-sm-4 col-xs-0 col-xs-12 caption">
        <br>
            <button class="btn btn-def" data-toggle="modal" data-target="#myModal{{$secretaire->id}}">Restaurer</button>
      </div>
          <!--button pour supprimer un infermier-->
      <div class="col-sm-4 col-xs-12 caption">
        <br>
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModall{{$secretaire->id}}">Supprimer</button>
      </div>

               
                       <!-- Modal de restaure -->
          <div class="modal fade" id="myModal{{$secretaire->id}}" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Creé le un compte </h4>
                  </div>
                </div>
                <div class="modal-body ">
                   <form action="{{url('Archive/secretaires/'.$secretaire->id)}}" method="POST">
                     {{csrf_field()}}
                  <div class="col-xs-12">
                      <label>Login :   </label>  {{$secretaire->email}}<br>
                      <label>Mode de passe : </label><input type="password" name="pws">
                  </div>

                  <div class="col-xs-6"><br>
                     <button type="sumbit" class="btn btn-def">Envoyer</button>
                  </div>
                   </form>
                  <div class="col-xs-6"><br>
                  <button type="button" class="btn btn-def" data-dismiss="modal">Annuler</button></div>
                </div>
                <div class="col-xs-12"><br></div>
              </div>
            </div>
          </div>

                       <!-- Modal de suppression -->
          <div class="modal fade" id="myModall{{$secretaire->id}}" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content col-xs-12">
                <div class="panel panel-danger">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmer supprission</h4>
                  </div>
                </div>
                <div class="modal-body ">
                  <div class="col-xs-6">
                   <form action="{{url('Archive/secretaires/'.$secretaire->id)}}" method="POST">
                     {{csrf_field()}}
                     {{method_field('DELETE')}}

                     <button type="sumbit" class="btn btn-danger">Oui</button>
                   </form>
                  </div>
                  <div class="col-xs-6">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Non</button></div>
                </div>
                <div class="col-xs-12"><br></div>
              </div>
            </div>
          </div>


    </div>
       @endif
       
	  <div class="col-xs-12"><br></div>
    
  </div>


@endsection