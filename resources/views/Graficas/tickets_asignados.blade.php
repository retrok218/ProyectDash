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
          <div class="card-header"><h4>Tickets Asignados </h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$asignado}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
      </div>
     
<!-- Creacion de graica tickets asignados -->

        <!--  <div class="row mb-3 shadow-lg p-3 mb-5 bg-white rounded">
            
              <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                    <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                        style="min-height: 400px; )">
                          <div id="chartContainerta"  > </div>
                    </div>
                </div>
              
            </div>
          </div>
        -->


<!-- Creacion de graica tickets asignados -->

      <div class="row">
        <div class="col-lg-12">
          
            <div class="card text-center"  >
            <div class="card-header titulo_card"><h4> Tickets Asignados </h4> </div>
            </div>
            <div class="card-body" >
              
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
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th ></th>
                        <th>Filtro/Filas </th>
                        <th></th>
                    </tfoot>
                    <tbody>
                      @foreach($tkasignado as $tkasignado)
                      <tr>
                        <td>{{$tkasignado->tn}}</td>
                        <td>{{$tkasignado->create_time}}</td>
                        <td>{{$tkasignado->title}}</td>
                        <td>{{$tkasignado->nombre .' '. $tkasignado->apellido}}</td>
                        <td>{{$tkasignado->qname}}</td>
                      <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
                        @if($tkasignado->name == 'closed successful' )
                        <td>Cerrado Exitosamente</td> 
                      @else
                      <td>{{$tkasignado->name}}</td>
                      @endif
                      <!-- Fin del cambio de texto-->

                      </tr>
                      @endforeach
                    </tbody>
               
                    
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
      "pageLength": 10,   
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

                           extend:    'pdfHtml5',
                           text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                           title:'Tickets Asignados ',
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
                           title:'Tickets Asignados',
                           titleAttr: 'Excel',
                           className: 'btn btn-app export excel',
                           exportOptions: {
                               columns: ':visible'
                           },
                       },

                       {
                           extend:    'print',
                           text:      '<i class="fa fa-print"></i>Imprimir',
                           title:'Tickets Asignados',
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
// Filtor por seleccion 
initComplete: function() {            
  this.api().columns([4]).every(function() {
    var column = this;
    //added class "mymsel"
    var select = $('<select class="mymsel" multiple="multiple" ><option value=""></option></select>')
      .appendTo($(column.footer()))
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
    var title = $(this).text();
       
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
