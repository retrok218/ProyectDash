@extends('home')
<meta http-equiv="refresh" content="180"> <!--se refresca la pagina cada x-s -->
  @section('content')
  <script>
  var titulo_tab = 'Tickets Totales';
</script>
  

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
           

                <table id="tablatk"  class="table table-striped- table-bordered table-hover table-checkable" >
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

