<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Datatable Tickets Totales</title>

    @include('layouts/css/css')
    @yield('styles')

  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
            <div class="card-header"><h2> Tickets Totales </h2> </div>
          </div>
          <div class="card-body">
  <!--begin: Datatable -->
                <table id="tablatk"  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>N Ticket</th>
                        <th> Creado </th>
                        <th> Asunto </th>
                        <th> Usuario </th>
                        <th> Area </th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tickets_totales as $tickets_totales)
                      <tr>
                        <td>{{$tickets_totales->tn}}</td>
                        <td>{{$tickets_totales->create_time}}</td>
                        <td>{{$tickets_totales->title}}</td>
                        <td>{{$tickets_totales->customer_user_id}}</td>
                        <td>{{$tickets_totales-> name}}</td>
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

@include('layouts/scripts/scripts')
<script>

var idioma=

            {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Sin tickets por el momento",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ Tickets",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 Tickets ",
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
                         title:'Titulo de tabla en pdf',
                         titleAttr: 'PDF',
                         className: 'btn btn-app export pdf',
                         exportOptions: {
                             columns: [ 0, 1 ]
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
                             columns: [ 0, 1 ]
                         },
                     },

                     {
                         extend:    'print',
                         text:      '<i class="fa fa-print"></i>Imprimir',
                         title:'Titulo de tabla en impresion',
                         titleAttr: 'Imprimir',
                         className: 'btn btn-app export imprimir',
                         exportOptions: {
                             columns: [ 0, 1 ]
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

  </body>
</html>
