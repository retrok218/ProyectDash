@extends('home')
<meta http-equiv="refresh" content="120 "> 
@section('content')

<script>
  var titulo_tab = 'Tickets Solicitud Toner';
</script>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">  
    <div class="row">
          
        <div class="col-lg-12">
            

    <table id="tablatktoner"  class="table table-striped table-bordered " >
        
        <thead >           
            <tr>
                <th>Numero del TKT</th>
                <th>Fecha </th>
                <th>Descripcion de TKT</th>
                <th>Fila</th>
                <th>Dependencia</th>
                <th>1.-Tipo de Toner </th>
                <th>1.-Cantidad</th>
                <th>2.-Tipo de Toner2 </th>
                <th>2.-Cantidad</th>
                <th>Cantidad entregada </th>
                <th>Cometario de Entrega</th>                                                    
                <th>Estado</th>      
            </tr>
        </thead>
        <tbody>

        @php
           /* class tktdefinitivo {
              public $numero_tiket = $tk_id ->tn; 
            Numero que identfica el TKT
            }

*/
        @endphp





    @php
// Funcion que limpia los datos traidos de la db dentro de la variable texto
        function eliminasimbolos($texto){                           
                        $eliminados1 = preg_replace('/FieldName/','',$texto);
                        $eliminados2 = preg_replace('/[\&\$\{\}""]+/','',$eliminados1);
                        $eliminados  = preg_replace('/ITSMReview/','',$eliminados2);
                        $eliminados3 = preg_replace('/@/','',$eliminados);
                        $eliminados4 = preg_replace('/#/','',$eliminados3);
                        $eliminados5 = preg_replace('/a-Vacio/','',$eliminados4);
                        $eliminados6 = preg_replace('/%%Value%%/','',$eliminados5);
                        $eliminados7 = preg_replace('/%%OldValue%%0/',' ',$eliminados6);
                        $eliminados8 = preg_replace('/%%OldValue%%/','',$eliminados7);
                        return $eliminados8;
                    }                          
                    $acumuladorsolicitado = 0;
                    $acumuladorentregado = 0;                             
        @endphp
@foreach($tk_id as $tk_id)
    @php 
            $texto = $tk_id->ticket_compuesto ;
            $modificado = eliminasimbolos($texto);                    
            $esptoner= array_pad(explode(',',$modificado),12," ");

             /* nuevo arreglo para quitar los require Repetidos*/
             $narreglo=0;

            

            
            
      
        foreach($esptoner as $datotoner){
          
                                if(strncasecmp($datotoner,'%%%%Required7',13)===0){
                                        $dependencia=preg_replace('/%%%%Required7/','',$datotoner . " ");
                                        $ticketocmpleto[$narreglo] =$dependencia;
                                        
                                    }                          
                // Solicitado cantidad 1
                                    elseif(strncasecmp($datotoner,'%%%%Required64',14)===0){
                                            $cantidad = preg_replace ('/%%%%Required64/','',$datotoner);
                                            $cantidad1 = (int) str_replace(' ', '', $cantidad); 
                                            $trnsbar = (int) $cantidad1;
                                        $acumuladorsolicitado += $trnsbar ;  
                                        $ticketocmpleto[$narreglo] =$cantidad1;
                                             
                                    }                          
                //tipo de toner1
                                    elseif(strncasecmp($datotoner,'%%%%Required65',14)===0){
                                        $tipodetoner1= preg_replace('/%%%%Required65/',' ' ,$datotoner);
                                        
                                    }
                // solicitado cantidad 2                           
                                    elseif(strncasecmp($datotoner,'%%%%Required66',14)===0){
                                            $cantidad2 = preg_replace ('/%%%%Required66/',' ',$datotoner);
                                            
                                             
                                    }
                // tipo de toner 2                           
                                    elseif(strncasecmp($datotoner,'%%%%Required67',14)===0){
                                            $tipotoner2 = preg_replace ('/%%%%Required67/','',$datotoner);
                                            
                                            
                                    }
                // Entregado tipotoner1         

                                    elseif(strncasecmp($datotoner,'%%%%Required34',14)===0){
                                            $ttonerentregado = preg_replace ('/%%%%Required34/','',$datotoner);
                                            
                                                        
                                    }
                                   
                //Entregado cantidadtoner1                           
                                    elseif(strncasecmp($datotoner,'%%%%Required35',14)===0){
                                      $cantidadtonerentregado1 = (int) preg_replace('/%%%%Required35/',' ',$datotoner);                                       
                                      }                                   
                                        $narreglo++;                                            
        }    
        
        $color= null;        
    @endphp       

                    @php    
                        switch($tk_id->name)  {
                            case 'Asignado' : $color = '#fff7085e'; break;
                            case 'Notificado al Usuario': $color = '#16ff1352'; break;
                            case 'open' : $color = '#ff0d0d52'; $tk_id->name = preg_replace('/open/','Abierto',$tk_id->name); break;
                           case 'closed successful' : $color = '#11ff018f' ; $tk_id->name = preg_replace('/closed successful/','Cerrado Exitosamente',$tk_id->name); break;
                           case 'Atendido': $color = '#01c4ff82'; break;
                        }                   
                    @endphp


                 <tr style="background:<?php echo $color ?>;">
                 <!--cuerpo principal de solicitu de toner -->
                    <td > 
                      <div class="login-box">
                        <a class="cardhvr" href="https://aplicaciones.finanzas.cdmx.gob.mx/otrs/index.pl?Action=AgentTicketZoom;TicketID={{$tk_id->ticket_id}}" target="_blank" title="Ir en busca del TKT en OTRS"> 
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                            {{$tk_id ->tn }}
                        </a>
                      </div>
                      
                    </td> 
                    <td>{{$tk_id->create_time}}</td>
                    <td>{{$tk_id->title}}</td>                         
                    <td>{{$dependencia}}</td>
                    <td>{{$tk_id->fila}}</td>
                    <td>{{$tipodetoner1}}</td>
                    <td>{{$cantidad1}}</td>
                <!--Campos extra en solicitud de toner  -->      
                    <td>{{$tipotoner2}}</td>
                    <td>{{$cantidad2}}</td> 
                    
                    @if(!isset($cantidadtonerentregado1)  or  !empty($cantidadtonerentregado1)  == false)    
                      @php
                      $cantidadtonerentregado1 = 0;
                      @endphp    

                      
                    @endif
                    <td>{{$cantidadtonerentregado1}}</td>
              
                    @if(!isset($ttonerentregado) or !empty($ttonerentregado) == false) <!--Comentario de entrega del toner -->
                        @php
                        $ttonerentregado = "Sin datos";
                        @endphp
                    @endif
                     <td>{{$ttonerentregado}}</td> 
                                     
                    <td>{{$tk_id->name}}</td>  
                    
                    
                </tr>   
                
                
    @endforeach

    
    
   
    
        
     
        </tbody>
        <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th >Filtro por dependecia</th>
            <th title="Al no seleccionar ningun campo se muestran todos los tickets con solicitud de toner no importando la marca del mismo ">Filtro por tipo de toner</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Filtro por estado de ticket</th> <!--11-->
        </tfoot>

        <div class="card-deck mt-3">
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header" ><h4>Tickets Totales</h4> </div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
            </div>
            <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
       
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h4>Tickets Solicitud de Toner  </h4> </div>
          
         
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$solicitudToner}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
        
      </div>
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header" ><h4>Toner Solicitados</h4> </div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$acumuladorsolicitado}} </i> </div>
            </div>
            <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
            
        </div>
        <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /> </h5> 

    </table>
</div>
</div>



</div>







@include('layouts/scripts/scripts')
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script> --> 
 <script src="{{URL::asset('js/dateTime.min.js')}}" ></script> 

<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>
  minDateFilter = "";
  maxDateFilter = "";
  $.fn.dataTableExt.afnFiltering.push(
  function(oSettings, aData, iDataIndex) {
    if (typeof aData._date == 'undefined') {
      aData._date = new Date(aData[1]).getTime();
    }

    if (minDateFilter && !isNaN(minDateFilter)) {
      if (aData._date < minDateFilter) {
        return false;
      }
    }

    if (maxDateFilter && !isNaN(maxDateFilter)) {
      if (aData._date > maxDateFilter) {
        return false;
      }
    }

    return true;
  }
);
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
              

$(document).ready(function(){ 
  $("#Date_search").val("");
});

var table = $('#tablatktoner').DataTable({ 


     
      select:true,  
      "pageLength": 10,   
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": idioma,
      "lengthMenu": [[10,20, -1],[10,20,"Mostrar Todo"]],
      "order":[1 ,'desc'],
      dom:'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
      dom:'Bfrtip',
      deferRender:true, 
      "search": {
        "regex": true,
        "caseInsensitive": false,
      },



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
                           text:      '<i class="bi bi-filetype-pdf"></i>PDF',
                           
                           title:'Tickets Solicitud de Toner',
                           titleAttr: 'PDF',
                           className: 'btn btn-app export pdf',
                           orientation: 'landscape',
                           pageSize: 'TABLOID',
                           exportOptions: {
                          columns: ':visible'
                           },
                            customize:function(doc) {
                           doc.styles.title = {
                                   color: '#75293db9',
                                   fontSize: '30',
                                   alignment: 'center'
                               }
                               doc.styles['td:nth-child(2)'] = {
                                   width: '100px',
                                   'max-width': '100px',
                                    margin: [ 0, 0, 0, 12 ],
                               },
                               doc.styles.tableHeader = {
                                   fillColor:'#75293db9',
                                   color:'white',
                                   alignment:'center',

                               }

                               doc.content[0].margin = [ 0, 0, 0, 12 ]


                           }
                           

                       },

                       {
                           extend:    'excelHtml5',
                           text:      '<i class="bi bi-filetype-exe"></i>Excel',
                           title:'Tickets Solicitud de Toner ',
                           titleAttr: 'Excel',
                           className: 'btn btn-app export excel',
                           exportOptions: {
                               columns: ':visible'
                           },
                       },

                       {
                           extend:    'print',
                           text:      '<i class="fa fa-print"></i>Imprimir',
                           title:'Tickets Solicitud de Toner',
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
                        targets: [7,8,10], // null para no ocultar columnas [1,2,3 ... ] cuando se requiera bloquear colmn 
                        visible: false
                        }] ,
            
// Filtro por seleccion multiple
initComplete: function() {            
  this.api().columns([4,5,11]).every(function() {
    var column = this;
    
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
},
//fin de la seleccion multiple 



           
"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,'']/g,'')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            pageTotal = api
                .column( 6, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column( 6 ).footer() ).html(
              'Toner solicitados: <br>' +  pageTotal 
            );

            pageTotal2 = api
                .column( 9, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column(9).footer() ).html(
                  'Toner Entregados: <br>' + pageTotal2 
                );
           
        },

        drawCallback: function () {
        var sum = $('#tablatktoner').DataTable().column(6).data().sum();
        $('#total').html(sum);
      }





          
});

$("#Date_search").daterangepicker({
  "locale": {
    "format": "YYYY-MM-DD",
    "separator": " a ",
    "applyLabel": "Filtrar",
    "cancelLabel": "Cancelar",
    "fromLabel": "De",
    "toLabel": "To",
    "customRangeLabel": "Custom",
    "weekLabel": "W",
    "daysOfWeek": [
      "Su",
      "Mo",
      "Tu",
      "We",
      "Th",
      "Fr",
      "Sa"
    ],
    "monthNames": [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ],
    "firstDay": 1
  },
  "opens": "center",
}, function(start, end, label) {
  maxDateFilter = end;
  minDateFilter = start;
  table.draw();  
});




</script>
<!-- fin de la datatable-->




@endsection
@endsection
