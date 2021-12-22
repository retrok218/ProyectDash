@extends('home')
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div>
    <h1>Prueva de pagina </h1>
     <h2>Creacion de prueva tabla con texto </h2>


        <table id="tablatk"  class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th> Numero del TKT</th>
                    
                    <th> Contenido </th>
                    
                    
                </tr>
            </thead>
            <tbody>
           @php
            function eliminasimbolos($texto){
                            $ttkt_a_eliminar= "";
                            $eliminados1 = preg_replace('/FieldName/',' ',$texto);
                            $eliminados2 = preg_replace('/[@\%\#\&\$\{\}\" "]+/',' ',$eliminados1);
                            $eliminados =  preg_replace('/ITSMReview/',' ',$eliminados2);

                            return $eliminados;
                        }
           
            @endphp

                @foreach($tk_id as $tk_id)
                    @php 
                        $texto = $tk_id->ticket_compuesto ;
                        $modificado = eliminasimbolos($texto);
                        
                        
                        
                    @endphp
                
                     <tr>
                        <td>{{$tk_id ->tn }}</td>                          
                        <td>{{$modificado}}</td>                         
                        

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
          "ordering": true,
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
