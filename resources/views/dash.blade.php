
@extends('home')
@section('content')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


    <div class="row">
      <div class="col-lg-12">
        <div class="card-deck mt-3">


          <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">

            <div class="card-header"><h3>Tickets Totales</h3> </div>

            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
            </div>
          </div>

          <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
            <div class="card-header"><h3>Tickets del Mes</h3> </div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $tickets_por_mes }} </i> </div>
            </div>
            <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Mes pasado
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item"> Ticket del mes pasado {{$pruemesp}} </a>
    </div>
  </div>

          </div>





          <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
            <div class="card-header"><h3>Tickets del Dia</h3> </div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px"> {{ $tickets_por_dia }} </i> </div>
            </div>
            <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dia pasado
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item"> Ticket del dia pasado {{$diap}} </a>
    </div>
  </div>


          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <a href="/grafic" class="btn btn-success btn-lg enable" role="button" aria-disabled="true">Estatus Tickets</a>
      </div>

    </div>

<br>

      <div class="row">
        <div class="col-lg-12">
          <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=$rticket aria-valuemin="0" aria-valuemax=$ticket style="width: 24%"></div>
          </div>
        </div>
      </div>



    <div class="row">
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


    <div class="row">
      <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
          <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
              <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                  style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
                    <div id="chartContainer4"  > </div>
              </div>
          </div>
        </div>
      </div>
    </div>




    <div class="row">
      <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
          <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
              <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                  style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
                    <div id="chartContainer1"  > </div>
              </div>
          </div>
        </div>
      </div>
    </div>






</div>




@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
<script type="text/javascript"> </script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js" ></script>

<!-- scrip grafica -->
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
      										 { label: "Tikets Totales", y: {{ $ticket}}  },
      										 { label: "Tickets Resueltos", y: {{$rticket}} },
      										 { label: "Tickets Asignados", y: {{$asignado}} },
      										 { label: "Tickets Cerrados por Tiempo", y: {{$cerradoPT}} }

      										 ]
      									 }
      									 ]
      								 });
                       chart.render();

                          // SEPARADOR

var chart = new CanvasJS.Chart("chartContainer4",{
                aanimationEnabled: true,
                animationDuration: 1000,
                interactivityEnabled: true,
                exportEnabled: true,
                culture:"es",
                theme:"light1",
                title:{text: " Tickets Por Mes"},


    axisX:{
      interval: 1,
  intervalType: "month",
  valueFormatString: "MMMM"

    },

    toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},


  data: [{
  		type: "line",
  		name: "2020",
  		color: "#369EAD",
  		showInLegend: true,
  		axisYIndex: 1,
      dataPoints: [
              {x:new Date(2021,00,00), y: {{$mes_enero}} },
              {x:new Date(2021,01,00), y: {{$mes_febrero}} },
              {x:new Date(2021,02,00), y: {{$mes_marzo}} },
              {x:new Date(2021,03,00), y: {{$mes_abril}} },
      ]
  	},
  	{
  		type: "line",
  		name: "2021",
  		color: "#C24642",
  		axisYIndex: 1,
  		showInLegend: true,
      dataPoints: [
              {x:new Date(2020,00,00), y: {{$mes_enero2}} },
              {x:new Date(2020,01,00), y: {{$mes_febrero2}} },
              {x:new Date(2020,02,00), y: {{$mes_marzo2}} },
              {x:new Date(2020,03,00), y: {{$mes_abril2}} },
      ]
  	}
  ]






});
chart.render();
function toggleDataSeries(e) {
if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
  e.dataSeries.visible = false;
} else {
  e.dataSeries.visible = true;
}
e.chart.render();
}









  // separador 2
    var chart = new CanvasJS.Chart("chartContainer1",
         {
           animationEnabled: true,
           animationDuration: 1000,
           interactivityEnabled: true,
           exportEnabled: true,
             title: {
                 text: "Tickets Estatus "
             },
             data: [
             {
               type: "column",
               indexLabel: "{label} - #percent%",
               dataPoints: [
                   { y: {{$ticket}}  , label: " Totales"  },
                   { y: {{$rticket}} , label: "Resueltos" },
                   { y: {{$asignado}} , label: "Tickets Asignados"  },
                   { y: {{$cerradoPT}} ,label: "Tickets Cerrados por Tiempo" }
                 ]
             }
             ]
         });
     chart.render();

     // Separador 3 construccion


  ;}

</script>






@endsection
@endsection
