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
          <div class="card-header"><h4>Tickets Abiertos </h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$abierto}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          
            <div class="card text-center"  >
            <div class="card-header titulo_card"><h4> Tickets Abiertos </h4> </div>
            </div>
            <div class="card-body" >

              <table  cellspacing="5" cellpadding="5">
               <!-- <button id="resetFilter">Limpiar Filtrado</button>-->
                
                <tbody>
                    <tr>
                      <td style="color: rgb(17, 17, 17)"> Buscar de la Fecha:</td>
                      <td><input type="text" id="min" name="min"></td>
                      <td style="color: rgb(17, 17, 17)"> a la Fecha :</td>
                      <td><input type="text" id="max" name="max"></td>
                        
                    </tr>
                   
                </tbody>
            </table>
              
  <!--begin: Datatable -->
                <table id="tablatk"  class="table table-striped table-bordered "  >
                    <thead >
                      <tr>
                        <th>N Ticket</th>
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
                        <td>{{$tickets_abiertos->tn}}</td>
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

      
<!--se agrega el includ para creacion de datatable -->
@include('layouts/scripts/scripts')
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<script>
      var idioma=

                  {
                      "sProcessing":     "Procesando...",
                      "sLengthMenu":     "Mostrar _MENU_ registros",
                      "sZeroRecords":    "No se encontraron resultados",
                      "sEmptyTable":     "Ningun dato disponible en esta tabla",
                      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                      "sInfoPostFix":    "",
                      "sSearch":         "Buscar Ticket:",
                      "sUrl":            "",
                      "sInfoThousands":  ",",
                      "sLoadingRecords": "Cargando...",
                      "oPaginate": {
                          "sFirst":    "Primero",
                          "sLast":     "Ultimo",
                          "sNext":     "Siguiente",
                          "sPrevious": "Anterior"
                      },
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      },
                      "buttons": {
                          "copyTitle": 'Informacion copiada',
                          
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
 //Filtro de seleccion por colubna   
    function cbDropdown(column) {
    return $('<ul>', {
      'class': 'cb-dropdown'
    }).appendTo($('<div>', {
      'class': 'cb-dropdown-wrap'
    }).appendTo(column));
  }
  // fin del filtro por colubna

    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });

    
var table = $('#tablatk').DataTable({      
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "language": idioma,
          "lengthMenu": [[10,20, -1],[10,20,30,"Mostrar Todo"]],
          "order":[1 ,'desc'],
          dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
          dom: 'Bfrtip',




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

                               extend:'pdfHtml5',
                               text:'<i class="fa fa-file-pdf-o"></i>PDF',
                               title:'Tickets Abiertos ',
                               titlealignment:'center',
                               titleAttr: 'PDF',
                               className: 'btn btn-app export pdf',
                               orientation: 'landscape',
                               pageSize: 'TABLOID',
                               exportOptions: {
                              columns: ':visible'
                               },
                                customize:function(doc) {
                               doc.styles.title = {
                                       color: '#75293d',
                                       fontSize: '30',
                                       alignment: 'rigt'
                                   }
                                   doc.styles['td:nth-child(2)'] = {
                                       width: '100px',
                                       'max-width': '100px',
                                        margin: [ 0, 0, 0, 12 ],
                                   },
                                   doc.styles.tableHeader = {
                                       fillColor:'#75293d',
                                       color:'white',
                                       alignment:'center',

                                   }


                                   doc.content[0].margin = [ 0, 0, 0, 12 ]


                               }
                               

                           },

                           {
                               extend:    'excelHtml5',
                               text:      '<i class="fa fa-file-excel-o"></i>Excel',
                               title:'Tickets Abiertos',
                               titleAttr: 'Excel',
                               className: 'btn btn-app export excel',
                               exportOptions: {
                                   columns: ':visible'
                               },
                           },

                           {
                               extend:    'print',
                               text:      '<i class="fa fa-print"></i>Imprimir',
                               title:'Tickets Abiertos',
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
               initComplete: function() {
      this.api().columns([4]).every(function() {
        var column = this;
        //added class "mymsel"
        var select = $('<select class="mymsel" multiple="multiple"><option value=""></option></select>')
          .appendTo($(column.footer()).empty())
          .on('change', function() {
            var vals = $('option:selected', this).map(function(index, element) {
              return $.fn.dataTable.util.escapeRegex($(element).val());
            }).toArray().join('|');

            column
              .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
              .draw();
          });

        column.data().unique().sort().each(function(d, j) {
          select.append('<option value="' + d + '">' + d + '</option>')
        });
      });
      //select2 init for .mymsel class
      $(".mymsel").select2();
    }
               
              
    });
  });

 
</script>
<!-- fin de la datatable-->



@endsection
@endsection