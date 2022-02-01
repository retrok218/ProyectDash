@extends('home')
@section('content')

<script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>

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
          <div class="card-header"><h4>Tickets Solicitud de Toner  </h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$solicitudToner}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
        
      </div>
      <div>

    <table id="tablatk"  class="table table-striped table-bordered " style="font-size: 11px;">
        <thead >
            <tr>
                <th>Numero del TKT</th>
                <th>Fecha Creacion TK</th>
                <th>Descripcion de TKT</th>
                <th>Fila</th>
                <th>Dependencia</th>
                <th>Tipo de Toner </th>
                <th>Cantidad</th>

                <th>Tipo de Toner2 </th>
                <th>Cantidad</th>
                <th>Cantidad entregada </th>
                <th>Cometario de Entrega</th>
                
                                    

                <th>Status TKT</th>      
            </tr>
        </thead>
        <tbody>
       @php
       // Funcion que limpia los datos traidos de la db dentro de la variable texto
        function eliminasimbolos($texto){                           
                        $eliminados1 = preg_replace('/FieldName/',' ',$texto);
                        $eliminados2 = preg_replace('/[@\%\#\&\$\{\}\" "]+/',' ',$eliminados1);
                        $eliminados  = preg_replace('/ITSMReview/',' ',$eliminados2);
                        $eliminados3 = preg_replace('/OldValue/',' ',$eliminados);
                        $eliminados4 = preg_replace('/Value/',' ',$eliminados3);
                        $eliminados5 = preg_replace('/a-Vacio/','Sin Datos',$eliminados4);
                        return $eliminados5;
                    }
                          
                    $acumuladorsolicitado = 0;
                    $acumuladorentregado = 0;
                    

        @endphp

@foreach($tk_id as $tk_id)
    @php 
                    $texto = $tk_id->ticket_compuesto ;
                    $modificado = eliminasimbolos($texto);                    
                    $esptoner= array_pad(explode(',',$modificado),7,null);
                    
         foreach($esptoner as $esptoner){
                if(strncasecmp($esptoner,'  Required7',11)===0){
                        $dependencia=preg_replace('/Required7/',' ' ,$esptoner);
                       }                          
// Solicitado cantidad 1
                       elseif(strncasecmp($esptoner,'  Required64',12)==0){
                            $cantidad = preg_replace ('/Required64/','',$esptoner);
                            $cantidad1 =str_replace(' ', '', $cantidad); 
                            $trnsbar = (int)$cantidad1;
                           $acumuladorsolicitado += $trnsbar ;

                       }                          
//tipo de toner1
                       elseif(strncasecmp($esptoner,'  Required65',12)==0){
                           $tipodetoner1= preg_replace('/Required65/',' ' ,$esptoner);
                       }
// solicitado cantidad 2                           
                       elseif(strncasecmp($esptoner,'  Required66',12)==0){
                            $cantidad2 = preg_replace ('/Required66/',' ',$esptoner);
                       }
// tipo de toner 2                           
                       elseif(strncasecmp($esptoner,'  Required67',12)==0){
                            $tipotoner2 = preg_replace ('/Required67/','',$esptoner);
                       }
// Entregado tipotoner1                              
                       if(strncasecmp($esptoner,'  Required34',12)===0){
                            $ttonerentregado = preg_replace ('/Required34/','',$esptoner);
                            $cantidadentregado1 =str_replace(' ', '', $ttonerentregado); 
                            $entregadoentero = (int)$cantidadentregado1;
                            $acumuladorentregado += $entregadoentero ;
                            

                       }
                       elseif($esptoner == null){
                            $ttonerentregado = "Sin datos";
                        }                       
//Entregado cantidadtoner1                           
                       if(strncasecmp($esptoner,'  Required35',12)===0){
                            $cantidadtonerentregado1 = preg_replace ('/Required35/','',$esptoner);
                       }
                       elseif($esptoner == null){
                            $cantidadtonerentregado1 = "Sin datos";
                        }                              
                    }    
                    

    @endphp 
       
            
                 <tr>
                 
                 <!--cuerpo principal de solicitu de toner -->
                    <td>{{$tk_id ->tn }}</td> 
                    <td>{{$tk_id->create_time}}</td>
                    <td>{{$tk_id->title}}</td>                         
                    <td>{{$dependencia}}</td>
                    <td>{{$tk_id->fila}}</td>
                    <td>{{$tipodetoner1}}</td>
                    <td>{{$cantidad1}}</td>
                <!--Campos extra en solicitud de toner  -->      
                    <td>{{$tipotoner2}}</td>
                    <td>{{$cantidad2}}</td> 
                    <td>{{$cantidadtonerentregado1}}</td> 
                    <td>{{$ttonerentregado}}</td>                                        
                    <td>{{$tk_id->name}}</td>                      
                </tr>                              
        @endforeach

        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header" ><h4>Toner Solicitados</h4> </div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$acumuladorsolicitado}} </i> </div>
            </div>
            <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
         
        
            
        </tbody>
    </table>
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
                      "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
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
                          "sLast":     "Ultimo",
                          "sNext":     "Siguiente",
                          "sPrevious": "Anterior"
                      },
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      },
                      "buttons": {
                          "colvis":"Visibilidad de COL",
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
       var  table  = $('#tablatk').DataTable( {
             fooderCallback: function (row,data,start,end,display){
                


             },




           "paging": true,
           dom: 'Bfrtip',
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false,
          "language": idioma,
          "lengthMenu": [[10,20, -1],[10,20,"Mostrar Todo"]],

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
                               title:'Tickets Estatus Solicitud Toner',
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
                               extend:'excelHtml5',
                               text:'<i class="fa fa-file-excel-o"></i>Excel',
                               title:'Tickets Estatus Solicitud Toner',
                               titleAttr: 'Excel',
                               className: 'btn btn-app export excel',
                               exportOptions: {
                                   columns: ':visible'
                               },
                           },
                           {
                               extend:    'print',
                               text:      '<i class="fa fa-print"></i>Imprimir',
                               title:'Tickets Estatus Solicitud Toner',
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
                        targets: [7,8], // null para no ocultar columnas [1,2,3 ... ] cuando se requiera bloquear colmn 
                        visible: false
                        }] 
                        
               



         } );
        }); //fin de la datatable 
        



</script>
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>

@endsection
@endsection
