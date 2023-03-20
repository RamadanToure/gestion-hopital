@extends('patients.index')

@section('patient')

    
         <!--afficher les patients-->
      <div class="col-xs-12" ><hr><br></div>

                    <!--afficher les 15 premiers patients-->
              @if($patients)

              <table class="col-xs-12">
                 @foreach($patients as $patient)
                 <tr></tr>
                  <tr>
                       <!--afficher la tof et le nom d'un medecin-->
                   <td class="col-sm-8 col-xs-6">
                    <div class="media">
                     <div class="media-left">
                        <a href="{{url('Patient/'.$patient->id)}}" target="_blank">
                          <img src="{{url('img/patients/'.$patient->image)}}" class="media-object" style="width:80px">
                        </a>
                      </div>
                     <div class="media-body">
                       <h3 class="media-heading">{{$patient->nom}} {{$patient->prenom}}</h3>
                       <p><b>SG°</b>{{$patient->song}} // <b>Taille:</b>{{$patient->taille}}m // <b>Poid:</b>{{$patient->poid}}kg // <b>DN°</b>{{$patient->datNai}} <br> <b>NS°</b>{{$patient->NumSecurite}} // <b>NT°</b>0{{$patient->tlf}} // <b>Email°</b>{{$patient->email}} // <b>AD°</b>{{$patient->adresse}}</p>
                      </div>
                   </div>
                   </td>
                           <!--button pour modefier un medecin-->
                   <td class="col-sm-1 col-xs-3">
                      <a class="btn btn-warning" href="{{url('Patient/'.$patient->id.'/edit')}}">Modefier</a>
                   </td>
                           <!--button pour supprimer un medecin-->
                   <td class="col-sm-1 col-xs-3">
                     <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$patient->id}}">Supprimer</button>

                 <!-- Modal -->
                <div class="modal fade" id="myModal{{$patient->id}}" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content col-xs-12">
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmer la supprission</h4>
                        </div>
                      </div>
                      <div class="modal-body ">
                        <div class="col-xs-6">
                        
                         <form action="{{url('Patient/'.$patient->id)}}" method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}

                           <button type="sumbit" class="btn btn-danger">Oui</button>
                         </form>
                        </div>
                        <div class="col-xs-6">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                      <div class="col-xs-12"><br></div>
                    </div>
                  </div>
                </div>
                
                   </td>
                 </tr>

                 @endforeach

                 </table>
                    <div class="col-xs-12"><br></div>
                 <!--pagination-->
                    <div class="col-sm-offset-4 col-xs-12">
                    @if($cmp>1)
                 @for($i=0; $i<=$cmp;$i++)
                     <a href="{{url('Patients/'.$i)}}" class="btn btn-info">{{$i+1}}</a>
                 @endfor
                    @endif
                     </div>
                    <div class="col-xs-12"><br></div>
              @endif
                   <!-- fin l'afficharge des patients-->
      


@endsection