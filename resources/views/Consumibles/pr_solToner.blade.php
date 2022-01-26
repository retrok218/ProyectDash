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
          <div class="card-header"><h4>Tickets Solicitud de Toner  </h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$solicitudToner}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
      </div>

    <div>
    
     


        <table id="tablatk"  class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th> Numero del TKT</th>
                    <th>Fecha Creacion TK</th>
                    <th>Descripcion de TKT</th>
                    <th>Fila</th>
                    <th>Dependencia</th>
                    
                    <th>Tipo de Toner </th>
                    <th>Cantidad</th>
                    <th>Tipo de Toner2 </th>
                    <th>Cantidad</th>
                    
                    
                    
                    
                    
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
                            //$cambio1 = preg_replace('/Required7/','Fila: ' ,$eliminados4);
                            //$cambio2 = preg_replace('/Required65/','Tipo de Toner1: ' ,$eliminados4 );
                            //$cambio3 = preg_replace ('/Required64/','Cantidad Solicitada1:',$cambio2);
                            $cambio4 = preg_replace('/a-Vacio/','Sin Datos',$eliminados4);
                            $cambio5 = preg_replace ('/Required66/','Cantidad Solicitada2:',$cambio4);
                            $cambio6 = preg_replace ('/Required67/','Tipo de Toner2:',$cambio5);
                            $cambio7 = preg_replace ('/Required63/','Consumible Entregado:',$cambio6);
                            $cambio8 = preg_replace ('/Required62/','Cantidad de Consumible:',$cambio7);
                            $cambio9 = preg_replace ('/Required61/','Consumible Entregado2:',$cambio8);
                            $cambio10 = preg_replace ('/Required60/','Cantidad de Consumible2:',$cambio9);
                            return $cambio10;
                        }
           
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
                           // Required64 representa la cantidad de toner solicitada de toner 1

                           elseif(strncasecmp($esptoner,'  Required64',12)===0){
                                $cantidad1 = preg_replace ('/Required64/',' ',$esptoner);
                           }
                           elseif(strncasecmp($esptoner,'  Required65:',12)===0){
                               $tipodetoner1=preg_replace('/Required65/',' ' ,$esptoner);
                           }

                           elseif(strncasecmp($esptoner,'  Cantidad Solicitada2:',23)==0){
                                $cantidad2 = $esptoner;
                           }
                           elseif(strncasecmp($esptoner,'  Tipo de Toner2:',16)==0){
                               $tipodetoner2=$esptoner;
                           }
                        }    
                    @endphp 

                    
                     <tr>
                     
                        <td>{{$tk_id ->tn }}</td> 
                        <td>{{$tk_id->create_time}}</td>
                        <td>{{$tk_id->title}}</td>                         
                        <td>{{$dependencia}}</td>
                        <td>{{$tk_id->fila}}</td>
                        
                        <td>{{$tipodetoner1}}</td>
                        <td>{{$cantidad1}}</td>
                        <td>{{$tipodetoner2}}</td>
                        <td>{{$cantidad2}}</td>
                        
                        
                        <td>{{$tk_id->name}}</td>                      
                    </tr>  
                    
                   
                   
            @endforeach
                
            </tbody>
        </table>
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
           dom: 'Bfrtip',
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false,
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
                        targets: null,
                        visible: false
                        }]  



         } );
        } );
</script>
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>

@endsection
@endsection
