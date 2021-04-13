
@extends('home')
@section('content')

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
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=$atendido aria-valuemin="0" aria-valuemax=$ticket style="width: 34%"></div>
          </div>
        </div>
      </div>



    <div class="row">
      <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
          <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
              <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                  style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
                <div >
                  <div >
                    <div id="chartContainer"  > </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xl-6">
        <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
            style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
          <div class="card-shadow mb-4">
            <div class="card-body">
              <div id="chartContainer4" > </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6">
        <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
            style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
          <div class="card-shadow mb-4">
            <div class="card-body">
              <div id="chartContainer1" > </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
            style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
          <div class="card-shadow mb-4">
            <div class="card-body">
              <<div id="chartContainer3" style="height: 300px; width: 100%;"> </div>
            </div>
          </div>
        </div>
      </div>






</div>

@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>

<script type="text/javascript">
<!-- scrip grafica -->
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

      						<script type="text/javascript">
                  window.onload = function (){


      								var chart = new CanvasJS.Chart("chartContainer",
      								{
      									animationEnabled: true,
      									animationDuration: 1000,
      									interactivityEnabled: true,
                        exportEnabled: true,

      									title:{
      										text: "Tickets "
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
      										 dataPoints: [
      										 { label: "Tikets Totales", y: {{ $ticket}}  },
      										 { label: "Tickets Estatus Resueltos", y: {{$rticket}} },
      										 { label: "Tickets Asignados", y: {{$asignado}} },
      										 { label: "Tickets Cerrados por Tiempo", y: {{$cerradoPT}} },

      										 ]
      									 }
      									 ]
      								 });
      								 chart.render();

      								 // SEPARADOR

      								 var chart = new CanvasJS.Chart("chartContainer4",
      						{
      							animationEnabled: true,
      							animationDuration: 1000,
      							interactivityEnabled: true,
      								title: {
      										text: "Tickets "
      								},
      								axisX: {
      										interval: 10,
      								},
      								data: [
      								{
      									type: "line",
      									legendMarkerType: "triangle",
      									legendMarkerColor: "green",
      									color: "rgba(255,12,32,.3)",


      										dataPoints: [

      											{ label: "Mes {{$mes}} "  ,y: {{$tickets_por_mes}} },
      											{ y: {{$rticket}} , label: "Resueltos" },
      											{ y: {{$asignado}} , label: "Tickets Asignados"  },
      											{ y: {{$cerradoPT}} ,label: "Tickets Cerrados por Tiempo" }
      										]
      								},
      								]
      						});
      				chart.render();

      				// separador 2

              var chart = new CanvasJS.Chart("chartContainer1",
         {
           animationEnabled: true,
           animationDuration: 1000,
           interactivityEnabled: true,
             title: {
                 text: "Tickets "
             },
             data: [
             {
               type: "column",
               dataPoints: [
                   { y: {{$ticket}} , label: " Totales"  },
                   { y: {{$rticket}} , label: "Resueltos" },
                   { y: {{$asignado}} , label: "Tickets Asignados"  },
                   { y: {{$cerradoPT}} ,label: "Tickets Cerrados por Tiempo" }
                 ]
             }
             ]
         });
     chart.render();

     // Separador 3 construccion
     var dataPoints = [];
     var stockChart = new CanvasJS.StockChart("chartContainer3",{
    title: {
        text: "StockChart Title"
      },
    charts: [{
      data: [{
        type: "line", //Change it to "spline", "area", "column"
        dataPoints : dataPoints
      }]
    }],
    navigator: {
      slider: {
        minimum: new Date({{$año}},{{$mes}}, {{$dia}}),
        maximum: new Date({{$año}},{{$mes}}, {{$dia}})
      }
    }
  });

  $.getJSON("https://canvasjs.com/data/docs/btcusd2018.json", function(data) {
    for(var i = 0; i < data.length; i++){
      dataPoints.push({x: new Date(data[i].date), y: Number(data[i].close)});
    }

    stockChart.render();
  });


   }


</script>






















@endsection
@endsection
