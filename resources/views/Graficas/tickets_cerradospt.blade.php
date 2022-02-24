@extends('home')
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
              <div class="card-header"><h4>Tickets Cerrados Por Tiempo </h4> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$cerradoPT}} </i> </div>
              </div>
              <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
            </div>
          </div>



<!-- Creacion de graica tickets asignados -->

      <div class="row">
        <div class="col-lg-12">
          
            <div class="card text-center"  >
            <div class="card-header titulo_card"><h4> Tickets Cerrados Por Tiempo </h4> </div>
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
                      @foreach($tickets_cerradosPT as $tickets_cerradosPT)
                      <tr>
                        <td>{{$tickets_cerradosPT->tn}}</td>
                        <td>{{$tickets_cerradosPT->create_time}}</td>
                        <td>{{$tickets_cerradosPT->title}}</td>
                        <td>{{$tickets_cerradosPT->nombre .' '. $tickets_cerradosPT->apellido}}</td>
                        <td>{{$tickets_cerradosPT->qname}}</td>
                      <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
                        @if($tickets_cerradosPT->name == 'closed successful' )
                        <td>Cerrado Exitosamente</td> 
                      @else
                      <td>{{$tickets_cerradosPT->name}}</td>
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