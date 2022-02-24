@extends('home')
@section('content')


    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
     
<!-- Creacion de graica tickets asignados -->

         <!-- <div class="row mb-3 shadow-lg p-3 mb-5 bg-white rounded">
            
              <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                    <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                        style="min-height: 400px; )">
                          <div id="chartContainerta"  > </div>
                    </div>
                </div>
              
            </div>
          </div> -->

          <div class="card-deck mt-3">
            <div class="card text-center  mb-3 bg-white" >
              <div class="card-header" ><h4>Tickets Totales</h4> </div>
                <div class="card-body">
                    <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
                </div>
                <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
            </div>
           
            <div class="card text-center  mb-3 bg-white" >
              <div class="card-header"><h4>Tickets Notificado al Usuario </h4> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$NotificadoAlUsuario}} </i> </div>
              </div>
              <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
            </div>
          </div>



<!-- Creacion de graica tickets asignados -->

      <div class="row">
        <div class="col-lg-12">
          
            <div class="card text-center"  >
            <div class="card-header titulo_card"><h4> Tickets Notificado al Usuario </h4> </div>
            </div>
            <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /> </h5>
            <div class="card-body" >
              
  <!--begin: Datatable -->
                <table id="tablatk"  class="table table-striped table-bordered "  >
                    <thead >
                      <tr>
                        <th>N Ticket</th>
                        <th> Creado </th>
                        <th> Asunto </th>
                        <th> Usuario </th>
                        <th> Area </th>
                        <th> Status TK</th>
                        

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tickets_notificadosalusuario as $tickets_notificadosalusuario)
                      <tr>
                        <td>{{$tickets_notificadosalusuario->tn}}</td>
                        <td>{{$tickets_notificadosalusuario->create_time}}</td>
                        <td>{{$tickets_notificadosalusuario->title}}</td>
                        <td>{{$tickets_notificadosalusuario->nombre .' '. $tickets_notificadosalusuario->apellido}}</td>
                        <td>{{$tickets_notificadosalusuario->qname}}</td>
                      <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
                        @if($tickets_notificadosalusuario->name == 'closed successful' )
                        <td>Cerrado Exitosamente</td> 
                      @else
                      <td>{{$tickets_notificadosalusuario->name}}</td>
                      @endif
                      <!-- Fin del cambio de texto-->

                      </tr>
                      @endforeach
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th> </th>
                        <th></th>
                        <th></th>
                        <th>Seleccione el area</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    
                </table>
              <!--end: Datatable -->
             
              </div>
              

          </div>
      </div>

      
<!--se agrega el includ para creacion de datatable -->
@section('scripts')

</script>


@endsection
@endsection
