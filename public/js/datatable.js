 
 $(document).ready(function(){

 
 minDateFilter = "";
  maxDateFilter = "";
  $.fn.dataTableExt.afnFiltering.push(
      function (oSettings, aData, iDataIndex) {
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
  var idioma =

      {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningun dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar Ticket:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Ultimo",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
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


  $(document).ready(function () {
      $("#Date_search").val("");
  });

  var table = $('#tablatk').DataTable({
      "pageLength": 10,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": idioma,
      "lengthMenu": [
          [10, 20, -1],
          [10,20,"Mostrar Todo"]
      ],
      "order": [1, 'desc'],
      dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
      dom: 'Bfrtip',
      deferRender: true,
      "search": {
          "regex": true,
          "caseInsensitive": false,
      },



      buttons: {
          dom: {
              container: {
                  tag: 'div',

              },
              buttonLiner: {
                  tag: null
              }
          },


          buttons: [

              {

                  extend: 'pdfHtml5',
                  text: '<i class="fas fa-file-pdf"></i>PDF',
                  title: titulo_tab ,
                  titleAttr: 'PDF',
                  className: 'btn btn-app export pdf',
                  orientation: 'landscape',
                  pageSize: 'TABLOID',
                  exportOptions: {
                      columns: ':visible'
                  },
                  customize: function (doc) {
                      doc.styles.title = {
                          color: '#114627',
                          fontSize: '30',
                          alignment: 'center'
                      }
                      doc.styles['td:nth-child(2)'] = {
                              width: '100px',
                              'max-width': '100px',
                              margin: [0, 0, 0, 12],
                          },
                          doc.styles.tableHeader = {
                              fillColor: '#114627',
                              color: 'white',
                              alignment: 'center',

                          }


                      doc.content[0].margin = [0, 0, 0, 12]


                  }


              },

              {
                  extend: 'excelHtml5',
                  text: '<i class="fas fa-file-excel"></i> Exel',
                  title: titulo_tab,
                  titleAttr: 'Excel',
                  className: 'btn btn-app export excel',
                  exportOptions: {
                      columns: ':visible'
                  },
              },

              {
                  extend: 'print',
                  text: '<i class="fa fa-print"></i>Imprimir',
                  title: titulo_tab,
                  titleAttr: 'Imprimir',
                  className: 'btn btn-app export imprimir',
                  exportOptions: {
                      columns: ':visible'
                  }
              },
              {
                  extend: 'pageLength',
                  titleAttr: 'Registros a mostrar',
                  className: 'selectTable'
              },
              'colvis'
          ]
      },
      // Filtro por seleccion multiple
      initComplete: function () {
          this.api().columns([4]).every(function () {
              var column = this;
              //added class "mymsel"
              var select = $('<select class="mymsel" multiple="multiple" ><option value=""></option></select>')
                  .appendTo($(column.footer()))
                  .on('change', function () {
                      var vals = $('option:selected', this).map(function (index, element) {
                          return $.fn.dataTable.util.escapeRegex($(element).val());
                      }).toArray().join('|');
                      column
                          .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                          .draw();
                  });
              column.data().unique().sort().each(function (d, j) {
                  select.append('<option value="' + d + '">' + d + '</option>')
              });
              var title = $(this).text();

          });
          //select2 init for .mymsel class
          $(".mymsel").select2();
      }
      //fin de la seleccion multiple 



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
  }, function (start, end, label) {
      maxDateFilter = end;
      minDateFilter = start;
      table.draw();
  });
 });