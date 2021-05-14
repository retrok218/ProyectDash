

<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
<script type="text/javascript"> </script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js" ></script>




<div class="row shadow-lg p-3 mb-5 bg-white rounded">
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
  </div>




<script type="text/javascript">

    window.onload = function (){
                  var dataLength = 0;
                    var data = [];
                    var updateInterval = 500;
                    updateChart();
                    function updateChart() {
                        $.getJSON("data.php", function (result) {
                            if (dataLength !== result.length) {
                                for (var i = dataLength; i < result.length; i++) {
                                    data.push({
                                        x: parseInt(result[i].valorx),
                                        y: parseInt(result[i].valory)
                                    });
                                }
                                dataLength = result.length;
                                chart.render();
                            }
                        });
                    }
    
    
                  CanvasJS.addCultureInfo("es",
                    {
                        decimalSeparator: ".",
                        digitGroupSeparator: ",",
                        days: ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"],
                        months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Nobiembre","Diciembre",]
                   });
      
             var chart = new CanvasJS.Chart("chartContainer",{
                                              animationEnabled: true,
                                              animationDuration: 1000,
                                              interactivityEnabled: true,
                            exportEnabled: true,
    
                                              title:{
                                                  text: "  Tickets  "
                                              },
    
                                              legend:{
                                  horizontalAlign: "right",
                                  verticalAlign: "center"
                               },
                                              data: [//array of dataSeries
                                                  { //dataSeries object
                                                   /*** Change type "column" to "bar", "area", "line" or "pie"***/
                                                   type: "pie",
                                                   showInLegend: true,
                                                   legendText: "{label}",
                               indexLabel: "{label} - #percent%",
    
                            dataPoints: [
                               
                               { label: "Tikets del area PostMaster ", y: {{$tk_por_area_1}}  },
                               { label: "Tikets del area Mesa de Servicio Raw ", y: {{$tk_por_area_2}}  },
                               { label: "Junk ", y: {{$tk_por_area_3}}  },
                               { label: "Misc ", y: {{$tk_por_area_4}}  },  
                               {label: "Sistemas::SSP",y: {{$tk_por_area_32}}   }, 
                               {label: "ST::ST-Egresos",y: {{$tk_por_area_33}}   }, 
                               {label: "Capital Humano",y: {{$tk_por_area_36}}   } ,
                               {label: "Sistemas::CDA",y: {{$tk_por_area_37}}   } ,
                            ]
                                               }
                                               ]
            });
      chart.render();                          
      
    ;}
    </script>
   