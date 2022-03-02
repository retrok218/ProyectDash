@extends('home')
  @section('content')
  

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @include('Graficas/card_estatus_tk')
  <!-- Tabla principal Tickets totales -->


    <div class="row">
      <div class="col-lg-12">
          <div class="card text-center"  >
            <div class="card-header titulo_card"><h2> Tickets Totales </h2> </div>
    
          </div>
          <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /> </h5>
  <!--begin: Datatable -->
          <div class="card-body">
           

                <table id="tablatk"  class="table table-striped table-bordered" >
                    <thead>
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
                      @foreach($tickets_totales as $tickets_totales)
                      @php
                      $nombre=$tickets_totales->nombre;
                      $apellido=$tickets_totales->apellido;
                      @endphp
                      <tr>
                        <td>{{$tickets_totales->tn}}</td>
                        <td>{{$tickets_totales->create_time}}</td>
                        <td>{{$tickets_totales->title}}</td>
                        <td>{{$nombre.''.$apellido}}</td>
                        <td>{{$tickets_totales->qname}}</td>
                        
                        <!--se cambia closed successful a Cerrado Exitosamente -->
                          @if($tickets_totales->name == 'closed successful' )
                            <td>Cerrado Exitosamente</td> 
                          @elseif($tickets_totales->name == 'open')
                            <td>Abierto</td>
                          @else
                            <td>{{$tickets_totales->name}}</td>
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
          </div>
    <!--end: Datatable -->
    </div>
  </div>

  </div>


@section('scripts')   
@endsection
@endsection

