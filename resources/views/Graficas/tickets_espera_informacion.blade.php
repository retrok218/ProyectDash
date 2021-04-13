@extends('home')
@section('content')



    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="card-deck mt-3">
            <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
              <div class="card-header"><h3>Tickets Totales</h3> </div>
                <div class="card-body">
                    <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
                </div>
                <a href="/grafic" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
            </div>

            <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
              <div class="card-header"><h3>Tickets Estatus Asignados</h3> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px " id="btAsignados"> {{ $asignado}} </i> </div>
              </div>
              <a href="/tks_asignados" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
            </div>

            <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
              <div class="card-header"><h3>Tickets Estatus Atendidos</h3> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $atendido}} </i> </div>
              </div>
              <a href="/tks_atendidos" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
            </div>
          </div>

          <div class="card-deck mt-3">
            <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
              <div class="card-header"><h3>Tickets  Estatus Pendientes</h3> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $pendienteatc}} </i> </div>
              </div>
              <a href="/tickets_pendiente" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>

            </div>
            <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
              <div class="card-header"><h3>Tickets  Solicitud de Toner</h3> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $solicitudroner}} </i> </div>
              </div>
              <a href="/tickets_sol_toner" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>

            </div>
            <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
              <div class="card-header"><h3>Tickets  Estatus En Espera de Informaicon</h3> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $espinformacion}} </i> </div>
              </div>
              <a href="/tickets_espera_inf" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>

            </div>

          </div>

        </div>

        </div>


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card text-center"  >
            <div class="card-header"><h2> Tickets Estatus Espera De Informacion  </h2> </div>
            </div>
            <div class="card-body">

              <div class="card mb-4 border-0">

  <!--begin: Datatable -->
                <table id="tablatk"  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Numero de Ticfket</th>
                        <th> Creado </th>
                        <th> Asunto </th>
                        <th> Area </th>
                        <th> Usuario </th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tkasignado as $tkasignado)
                      <tr>
                        <td>{{$tkasignado->tn}}</td>
                        <td>{{$tkasignado->create_time}}</td>
                        <td>{{$tkasignado->title}}</td>
                        <td>{{$tkasignado->name}}</td>
                        <td>{{$tkasignado->customer_user_id}}</td>

                      </tr>
                      @endforeach
                    </tbody>
                </table>
              <!--end: Datatable -->
              </div>
              </div>
              </div>

          </div>
      </div>

      </div>
      @include('layouts/scripts/scripts')
      <script>

      var idioma=

                  {
                      "sProcessing":     "Procesando...",
                      "sLengthMenu":     "Mostrar _MENU_ registros",
                      "sZeroRecords":    "No se encontraron resultados",
                      "sEmptyTable":     "Sin tickets por el momento",
                      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                      "sInfoPostFix":    "",
                      "sSearch":         "Buscar:",
                      "sUrl":            "",
                      "sInfoThousands":  ",",
                      "sLoadingRecords": "Cargando...",
                      "oPaginate": {
                          "sFirst":    "Primero",
                          "sLast":     "Ãšltimo",
                          "sNext":     "Siguiente",
                          "sPrevious": "Anterior"
                      },
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      },
                      "buttons": {
                          "copyTitle": 'Informacion copiada',
                          "copyKeys": 'Use your keyboard or menu to select the copy command',
                          "copySuccess": {
                              "_": '%d filas copiadas al portapapeles',
                              "1": '1 fila copiada al portapapeles'
                          },
                          "pageLength": {
                          "_": "Mostrar %d filas",
                          "-1": "Mostrar Todo"
                          }
                      }
                  };

        $(document).ready(function(){
         $('#tablatk').DataTable( {
           "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "language": idioma,
          "lengthMenu": [[10,20, -1],[10,20,30,"Mostrar Todo"]],

          "order":[1 ,'desc'],
          dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',


          buttons: {
                dom: {
                  container:{
                    tag:'div',
                    className:'flexcontent'
                  },
                  buttonLiner: {
                    tag: null
                  }
                },




                buttons: [



                           {
                               extend:    'pdfHtml5',
                               text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                               title:'Tickets ',
                               titleAttr: 'PDF',
                               className: 'btn btn-app export pdf',
                               exportOptions: {
                                   columns: [ 0,1,2,3,4 ]
                               },
                               customize:function(doc) {

                                   doc.styles.title = {
                                       color: '#4c8aa0',
                                       fontSize: '30',
                                       alignment: 'center'
                                   }
                                   doc.styles['td:nth-child(2)'] = {
                                       width: '100px',
                                       'max-width': '100px'
                                   },
                                   doc.styles.tableHeader = {
                                       fillColor:'#4c8aa0',
                                       color:'white',
                                       alignment:'center'
                                   },
                                   doc.content[1].margin = [ 100, 0, 100, 0 ]

                               }

                           },

                           {
                               extend:    'excelHtml5',
                               text:      '<i class="fa fa-file-excel-o"></i>Excel',
                               title:'Titulo de tabla en excel',
                               titleAttr: 'Excel',
                               className: 'btn btn-app export excel',
                               exportOptions: {
                                   columns: [ 0,1,2,3,4 ]
                               },
                           },

                           {
                               extend:    'print',
                               text:      '<i class="fa fa-print"></i>Imprimir',
                               title:'Titulo de tabla en impresion',
                               titleAttr: 'Imprimir',
                               className: 'btn btn-app export imprimir',
                               exportOptions: {
                                   columns: [ 0,1,2,3,4 ]
                               }
                           },
                           {
                               extend:    'pageLength',
                               titleAttr: 'Registros a mostrar',
                               className: 'selectTable'
                           }
                       ]


               }



         } );
        } );
</script>

@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>

@endsection
@endsection
