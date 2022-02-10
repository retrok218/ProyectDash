@extends('home')
@section('content')



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
                          
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>                     
                          <td></td>
                          <td></td>
                          
                        </tr>
                        
                      </tfoot>
                  </table>
                <!--end: Datatable -->
               
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
                      "sEmptyTable":     "Sin Tikets por el momento",
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
 var table =  $('#tablatk').DataTable( {
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
                   
                  },
                  buttonLiner: {
                    tag: null
                  }
                },




                buttons: [



                           {
                               extend:    'pdfHtml5',
                               text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                               title:'Tickets Pendiente',
                               titleAttr: 'PDF',
                               className: 'btn btn-app export pdf',
                               orientation: 'landscape',
                               pageSize: 'TABLOID',
                               exportOptions: {
                              columns: ':visible'
                               },
                               customize:function(doc) {

                                   doc.styles.title = {
                                       color: '#4c8aa0',
                                       fontSize: '30',
                                       alignment: 'center'
                                   }
                                   doc.styles['td:nth-child(2)'] = {
                                       width: '100px',
                                       'max-width': '100px',
                                        margin: [ 0, 0, 0, 12 ],
                                   },
                                   doc.styles.tableHeader = {
                                       fillColor:'#4c8aa0',
                                       color:'white',
                                       alignment:'center',


                                   }


                                   doc.content[0].margin = [ 0, 0, 0, 12 ]


                               }

                           },

                           {
                               extend:    'excelHtml5',
                               text:      '<i class="fa fa-file-excel-o"></i>Excel',
                               title:'Tickets Pendiente',
                               titleAttr: 'Excel',
                               className: 'btn btn-app export excel',
                               exportOptions: {
                                   columns: ':visible'
                               },
                           },

                           {
                               extend:    'print',
                               text:      '<i class="fa fa-print"></i>Imprimir',
                               title:'Tickets Pendiente',
                               titleAttr: 'Imprimir',
                               className: 'btn btn-app export imprimir',
                               exportOptions: {
                                   columns: ':visible'
                               }
                           },
                           {
                               extend:    'pageLength',
                               titleAttr: 'Registros a mostrar',
                               className: 'selectTable'
                           },
                           
                       ]


               },
              



         } );

        } );
</script>

@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
<script type="text/javascript">

        

</script>





@endsection
@endsection
