@extends('home')
@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid ">

<div class="row shadow-lg p-3 mb-5 bg-white rounded fondo " >
    <div class=" card-header shadow-sm p-3 mb-5 bg-white rounded ">
      <div class="col-lg-12 ">
        <h1 class="h1t">Monitoreo de Tickets </h1>
      </div>
    </div>

    <div class=" card-deck text-center  col-lg-12 " >
        <div class="col-lg-4 shadow p-3 mb-5 bg-white rounded">
              <h4>Tickets </h4>
              <div class="card-body "> <i class="fa fa-address-card logocard"> {{ $ticket }} </i> </div>
        </div>

        <div class="  col-lg-4 shadow p-3 mb-5 bg-white rounded" >
              <h4 >Tickets del Mes</h4>
              <div class="card-body"> <i class="fa fa-address-card logocard"> {{ $tickets_por_mes }} </i> </div>
              <button type="button" class="btn btn-default dropdown-toggle"
                 data-toggle="dropdown"> Ticket del Mes Pasado <span class="">
               </span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a>{{$mesp}}</a></li>
              </ul>
            <i class="bi bi-arrow-down-square-fill"></i>
        </div>

        <div class="  col-lg-4 shadow p-3 mb-5 bg-white rounded" >
          <h4 >Tickets del dia</h4>
          <div class="card-body"> <i class="fa fa-address-card logocard"> {{ $tickets_por_dia }} </i> </div>
          <button type="button" class="btn btn-default dropdown-toggle"
             data-toggle="dropdown"> Ticket del Dia Pasado <span class="">
           </span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a>{{$diap}}</a></li>
          </ul>
        <i class="bi bi-arrow-down-square-fill"></i>
    </div>

    </div>

</div>
    <div class="row shadow-lg p-3 mb-5 bg-white rounded fondo">
      <div class="col-lg-12 ">
        <div class="card-deck mb-3 bg-white">

  				<div class="col-md-4">
            <div class="card ">
              <div class="card-header  text-center border-dark  mb-3  "><h3>Tickets Totales</h3> </div>
  					  <div class="inview" id="sales-doughnut-chart-us"></div>
  				  </div>
          </div>

  				<div class="col-md-4">
            <div class="card">
              <div class="card-header text-center border-dark  mb-3 "><h3>Tickets Resueltos </h3> </div>
              <div class="inview" id="sales-doughnut-chart-nl"></div>
            </div>
  				</div>

  				<div class="col-md-4">
            <div class="card">
              <div class="card-header text-center border-dark  mb-3 "> <h3>Tickets Asignados</h3> </div>
              <div class="inview" id="sales-doughnut-chart-de"></div>
            </div>
  				</div>
        </div>
      </div>
    </div>

    <div class="row ">
      <div class="col-lg-12">
        <span class="spinner-grow spinner-grow-sm"></span>
        <a href="/grafic" class="btn btn-outline-success" role="button" aria-disabled="true">Estatus Tickets {{$tk_por_area_1}}</a>
      </div>
    </div>
<br>




<div class="card   mb-3 shadow-lg p-3 mb-5 bg-white rounded  " style="max-width: 100rem;">
    <div class="row">
      <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid kt-widget19">

            <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                style="min-height: 400px; background-image: url(./assets/media//products/product4.jpg)">
                  <div id="chartContainer"  > </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="row shadow-lg p-3 mb-5 bg-white rounded">
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




    <div class="row shadow-lg p-3 mb-5 bg-white rounded">
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
      										text: "  Tickets {{$ticket}}  "
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
      										 { label: "Tikets Nuevos - {{$nuevo}} ", y: {{$nuevo }}  },
                           { label: "Tikets resuelto-{{$rticket }} ", y: {{$rticket }}  },
                           { label: "Tikets cerradoinex-{{$cerradocinEX }} ", y: {{$cerradocinEX }}  },
                           { label: "Tikets Abierto-{{ $open}} ", y: {{ $open}}  },
                           { label: "Tikets removed-{{$removed }} ", y: {{$removed }}  },
                           { label: "Tikets Pendiente Reminder-{{$pendienteRE }}  ", y: {{$pendienteRE }}  },
                           { label: "Tikets Pendiente Auto Cerrado-{{$pendienteatc }}", y: {{$pendienteatc }}  },
                           { label: "Tikets Cerrado por Tiempo-{{$cerradoPT }} ", y: {{$cerradoPT }}  },
                           { label: "Tikets Notificado-{{$notificadoalU }} ", y: {{$notificadoalU }}  },
                           { label: "Tikets Asignado- {{$asignado }}", y: {{$asignado }}  },
                           { label: "Tikets Atendido-{{$atendido }} ", y: {{$atendido }}  },
                           { label: "Tikets espera de informacion-{{$espinformacion }} ", y: {{$espinformacion }}  },
                           { label: "Tikets merged - {{$merged}} ", y: {{$merged }}  },
                           { label: "Tikets Doc Firmado - {{$Documentofirmado}} ", y: {{$Documentofirmado }}  },
                           { label: "Tikets En Tramite - {{$Entramite}} ", y: {{$Entramite }}  },
                           { label: "Tikets falta Documentar - {{$FaltaDocumentar}} ", y: {{$FaltaDocumentar }}  },
                           { label: "Tikets Falta Acta Res - {{$FalteActaRES}} ", y: {{$FalteActaRES }}  },





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
               ilegendText: "{label}",

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

     // Separador 3 construccion

  var chart = new CanvasJS.Chart("sales-doughnut-chart-us",
       {
         animationEnabled: true,
          backgroundColor: "white",

          title: {
            fontColor: "#848484",
            fontSize: 70,
            horizontalAlign: "center",
            text: "{{$ticket}}",
            verticalAlign: "center"
          },
          toolTip: {
            backgroundColor: "#ffffff",
            borderThickness: 0,
            cornerRadius: 0,
            fontColor: "#424242"
           },
           data: [
           {
             explodeOnClick: false,
              innerRadius: "90%",
              radius: "90%",
              startAngle: 270,
              type: "doughnut",


             dataPoints: [
               { y: {{$ticket}}, color: "#1F842F ", toolTipContent:null },
               ]
           }
           ]
       });
   chart.render();


   var chart = new CanvasJS.Chart("sales-doughnut-chart-nl",
        {
          animationEnabled: true,
           backgroundColor: "white",

           title: {
             fontColor: "#848484",
             fontSize: 70,
             horizontalAlign: "center",
             text: "{{$rticket}}",
             verticalAlign: "center"
           },
           toolTip: {
             backgroundColor: "#ffffff",
             borderThickness: 0,
             cornerRadius: 0,
             fontColor: "#424242"
            },
            data: [
            {
              explodeOnClick: false,
               innerRadius: "90%",
               radius: "90%",
               startAngle: 270,
               type: "doughnut",


              dataPoints: [

                { y: {{$ticket-$rticket}}, name: "Diferente Estatus", color:  "#F11B1B", exploded: true  },
                { y:  {{$rticket}} , name: "Ticket Resueltos", color: "#1F842F" ,toolTipContent:null}
                ]
            }
            ]
        });
    chart.render();


    var chart = new CanvasJS.Chart("sales-doughnut-chart-de",
         {
           animationEnabled: true,
            backgroundColor: "white",

            title: {
              fontColor: "#848484",
              fontSize: 70,
              horizontalAlign: "center",
              text: "{{$asignado}}",
              verticalAlign: "center"
            },
            toolTip: {
              backgroundColor: "#ffffff",
              borderThickness: 0,
              cornerRadius: 0,
              fontColor: "#424242"
             },
             data: [
             {
               explodeOnClick: false,
                innerRadius: "90%",
                radius: "90%",
                startAngle: 270,
                type: "doughnut",
                dataPoints: [
                  { y: {{$ticket-$asignado}}, name: "Tks Diferente Estatus", color:  "#F11B1B" , exploded: true  },
                  { y:  {{$asignado}} , name: "Ticket Asignados", color: "#1F842F" ,toolTipContent:null}
                 ]
             }
             ]
         });
     chart.render();

;}
</script>

@endsection
@endsection
