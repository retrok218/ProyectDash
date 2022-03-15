@extends('home')
<meta http-equiv="refresh" content="30">
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
      <div class="card-deck mt-3">
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header" ><h4>Tickets Totales</h4> </div>
            <div class="card-body">                         
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>            
            </div>
            <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
            
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h4>Tickets Abiertos </h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$abierto}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          
            <div class="card text-center"  >
            <div class="card-header titulo_card"><h2> Tickets Abiertos </h2> </div>
            </div>
            <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /> </h5>
            <div class="card-body" >

              
              
  <!--begin: Datatable -->
                <table id="tablatk"  class="table table-striped table-bordered "  >
                    <thead >
                      <tr>
                        <th>Numero de Ticket</th>
                        <th> Creado </th>
                        <th> Asunto </th>
                        <th> Usuario </th>
                        <th> Area/Fila </th>
                        <th> Status TK</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tickets_abiertos as $tickets_abiertos)
                      <tr>
                        <td><a class="cardhvr" href="https://aplicaciones.finanzas.cdmx.gob.mx/otrs/index.pl?Action=AgentTicketZoom;TicketID={{$tickets_abiertos->id}}" target="_blank" title="Ir en busca del TKT en OTRS">{{$tickets_abiertos->tn}}</a></td>
                        <td>{{$tickets_abiertos->create_time}}</td>
                        <td>{{$tickets_abiertos->title}}</td>
                        <td>{{$tickets_abiertos->nombre .' '. $tickets_abiertos->apellido}}</td>
                        <td>{{$tickets_abiertos->qname}}</td>
                      <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
                        @if($tickets_abiertos->name == 'open' )
                        <td>abierto</td> 
                      @else
                      <td>{{$tickets_abiertos->name}}</td>
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
      
<!--se agrega el includ para creacion de datatable -->

@section('scripts')

@endsection
@endsection