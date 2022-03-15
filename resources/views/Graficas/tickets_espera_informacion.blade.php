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
                            <div class="card-header"><h2>Tickets En Espera de Información </h2> </div>
                            
                            <div class="card-body">
                                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$espinformacion}} </i> </div>
                            </div>
                            <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
                          </div>
                        </div>
                <!-- Grafica Tickets Esspera de informacion  -->
                



                <div class="row">
                  <div class="col-xl-12">
                    <div >
                      <div class="card text-center"  >
                      <div class="card-header titulo_card"><h2> Tickets Espera de Información </h2> </div>
                      </div>
                      <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /> </h5>
                      <div class="card-body" >
                        
            <!--begin: Datatable -->
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
                                @foreach($tickets_esp_info as $tickets_esp_info)
                                <tr>
                                  <td>{{$tickets_esp_info->tn}}</td>
                                  <td>{{$tickets_esp_info->create_time}}</td>
                                  <td>{{$tickets_esp_info->title}}</td>
                                  <td>{{$tickets_esp_info->nombre .' '. $tickets_esp_info->apellido}}</td>
                                  <td>{{$tickets_esp_info->qname}}</td>
                        
                        <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
                                     @if($tickets_esp_info->name == 'closed successful' )
                                    <td>Cerrado Exitosamente</td> 
                                    @else
                                    <td>{{$tickets_esp_info->name}}</td>
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
