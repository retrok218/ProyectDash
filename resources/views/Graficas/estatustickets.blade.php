@extends('home')
  @section('content')
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @include('Graficas/card_estatus_tk')
  <!-- Tabla principal Tickets totales -->


    <div class="row">
      <div class="col-lg-12">
          <div class="card text-center"  >
            <div class="card-header titulo_card"><h2> Tickets Totales </h2> </div>
          </div>
  <!--begin: Datatable -->
          <div class="card-body">
            <table  cellspacing="5" cellpadding="5">
            
              <tbody>
                <tr>
                  <td style="color: rgb(17, 17, 17)"> Buscar de la Fecha:</td>
                  <td><input type="text" id="min" name="min"></td>
                  <td style="color: rgb(17, 17, 17)"> a la Fecha :</td>
                  <td><input type="text" id="max" name="max"></td>
                    
                </tr>
              </tbody>
          </table>

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
                      <tr>
                        <td>{{$tickets_totales->tn}}</td>
                        <td>{{$tickets_totales->create_time}}</td>
                        <td>{{$tickets_totales->title}}</td>
                        <td>{{$tickets_totales->nombre .' '. $tickets_totales->apellido}}</td>
                        <td>{{$tickets_totales->qname}}</td>
                        
                        <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
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
                    
                </table>     
          </div>
    <!--end: Datatable -->
    </div>
  </div>

  </div>

@include('layouts/scripts/scripts')
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>


  <script> 
  var idioma=

            {
                "sProcessing":     "Procesando...",
                
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningun dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ Tickets",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 Tickets ",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    
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
var minDate, maxDate;
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[1] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
            

 $(document).ready(function(){
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
var table = $('#tablatk').DataTable({
  "paging": true,
  "orderClasses": false,
    "pageLength": 10,    
    "language": idioma,
    "order":[1,'desc'],
    dom: 'Bfrtp',
    buttons: {
          dom: {
            container:{
              tag:'div',
            
            },
            buttonLiner: {
              tag: null
            }
          },

          buttons: [
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                        title:'Tickets Totales',
                        titleAttr: 'PDF',
                        className: 'btn btn-app export pdf',
                        orientation: 'landscape',
                        pageSize: 'TABLOID',
                        exportOptions: {
                        columns: ':visible'
                        },
                        customize:function(doc) {

                            doc.styles.title = {
                                color: '#114627',
                                fontSize: '30',
                                alignment: 'center'
                            }
                            doc.styles['td:nth-child(2)'] = {
                                width: '100px',
                                'max-width': '100px',
                                  margin: [ 0, 0, 0, 12 ],
                            },
                            doc.styles.tableHeader = {
                                fillColor:'#114627',
                                color:'white',
                                alignment:'center',

                            }


                            doc.content[0].margin = [ 0, 0, 0, 12 ]


                        }

                    },

                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>Excel',
                        title:'Tickets Totales',
                        titleAttr: 'Excel',
                        className: 'btn btn-app export excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },

                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>Imprimir',
                        title:'Tickets Totales',
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
                    'colvis'
                ]
                    
        },
         columnDefs:[{
          targets: false,
          visible: false,
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }


                        }] 
        



  });

  $('#min, #max').on('change', function () {
        table.draw();
      });
  // text search
  $('.filtro-por-col').keyup(function(){
     table.column($(this).data('column'))
     .search($(this).val())
     .draw();
   });

   //filtro por lista
   $('.filtro-por-lista').change(function(){
     table.column($(this).data('column'))
     .search($(this).val())
     .draw();
   });
  });
  </script>
  <!-- fin de Tabla ticket totales  -->
  
  @endsection
@endsection

