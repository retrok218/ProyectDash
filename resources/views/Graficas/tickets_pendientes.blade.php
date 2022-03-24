@extends('home')
<meta http-equiv="refresh" content="30">
@section('content')
<script>
  var titulo_tab = 'Tickets Pendiente';
</script>


    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
      <!-- Grafica Tickets Pendientes -->
      <!--
                <div class="row">
                  <div class="col-lg-12">
                    <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                      <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                          <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                              style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
                                <div id="chartContainer"  > </div>
                          </div>
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
                    <div class="card-header"><h4>Tickets Pendiente</h4> </div>
                    <div class="card-body">
                        <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$pendienteatc}} </i> </div>
                    </div>
                    <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
                  </div>
                </div>

        <!-- Fin Grafica Tickets Pendientes -->
        <div class="row">
          <div class="col-xl-12">
            <div class="card ">
              <div class="card text-center"  >
              <div class="card-header titulo_card"><h2> Tickets Pendiente </h2> </div>
              </div>
              <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /> </h5>
              <div class="card-body" >
                
    <!--Comienza : Datatable -->
                  <table id="tablatk"  class="table table-striped table-bordered " >
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
                        @foreach($tickets_pendiente as $tickets_pendiente)
                        <tr>
                          <td>{{$tickets_pendiente->tn}}</td>
                          <td>{{$tickets_pendiente->create_time}}</td>
                          <td>{{$tickets_pendiente->title}}</td>
                          <td>{{$tickets_pendiente->nombre .' '. $tickets_pendiente->apellido}}</td>
                        <td>{{$tickets_pendiente->qname}}</td>
                        
                        <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
                          @if($tickets_pendiente->name == 'closed successful' )
                            <td>Cerrado Exitosamente</td> 
                          @else
                          <td>{{$tickets_pendiente->name}}</td>
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
        </div>
        </div>
      

@section('scripts')


        







@endsection
@endsection
