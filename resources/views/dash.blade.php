@extends('home')
@section('content')


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid ">

<div class="row shadow-lg p-3 mb-5  rounded fondo1 " >


    <div class=" card-header shadow-sm p-3 mb-5 rounded " style="background: transparent ">
      <div class="col-lg-12 ">
         <h1 class="h1t">Monitoreo de Tickets  </h1>
         
          <div class="nav2">
          <div class="new2" > New </div>
          <div id="news2"></div>
          <div class="clear2"></div>
          </div>

          
      </div>
    </div>

    <div  class=" card-deck text-center  col-lg-12 " >
      <div class="card">
        
          <div class="card-header titulo_card"><h2>Tickets Totales </h2></div>             
              <div class="card-body  "> <i class="fa fa-address-card logocard"> {{ $ticket }} </i> </div>
       
      </div>
      <div class="card">
        
            <div class="card-header titulo_card"><h2 >Tickets del Mes</h2> </div>    
              <div class="card-body"> <i class="fa fa-address-card logocard"> {{ $tickets_por_mes }} </i> </div>
              <button type="button" class="btn btn-default dropdown-toggle"
                 data-toggle="dropdown"  > Ticket del Mes Pasado 
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><h4 style="align-items: center"> {{$mesp}} </h4> </li>
              </ul>
            
         
        </div>
      <div class="card">
        
          <div class="card-header titulo_card"><h2>Tickets del dia</h2></div>
          <div class="card-body"> <i class="fa fa-address-card logocard"> {{ $tickets_por_dia }} </i> </div>
          <button type="button" class="btn btn-default dropdown-toggle"
             data-toggle="dropdown"> Ticket del Dia Pasado <span class="">
           </span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><h4> {{$diap}} </h4></li>
          </ul>
          <i class="bi bi-arrow-down-square-fill"></i>
       
      </div>

    </div>
    <br>
  
    <div class="row" >
      <div class="col-lg-12">
        <span class="spinner-grow spinner-grow-sm"></span>
        <a href="{{url('users/grafic')}}" class="btn btn-success" role="button" aria-disabled ="true">Estatus Tickets</a>        
      </div>
    </div>

</div >
    <div  class="row shadow-lg p-3 mb-5  rounded fondo  fondo1" >
      <div class="col-lg-12 ">
        <div class="card-deck mb-3 ">

  				<div class="col-md-4">
            <div class="container ">
              <div  class="card-header  text-center border-dark  mb-3 h1t  "><h3>Tickets Totales</h3> </div>
  					  
              <div  class="inview" id="sales-doughnut-chart-us"></div>
            
  				  </div>
          </div>

  				<div class="col-md-4">
            <div class="container">
              <div class="card-header text-center border-dark  mb-3 h1t "><h3>Tickets Cerrados Exitosamente </h3> </div>
              <div class="inview" id="sales-doughnut-chart-nl"></div>
            </div>
  				</div>

  				<div class="col-md-4">
            <div class="container">
              <div class="card-header text-center border-dark  mb-3 h1t "> <h3>Tickets Asignados</h3> </div>             
              <div class="inview" id="sales-doughnut-chart-de"></div>          
            </div>
  				</div>
        </div>
      </div>
      
    </div>

    

<div class="container   mb-3 shadow-lg p-3 mb-5 bg-white rounded  " style="max-width: 100rem;">  
  <div class="row ">
      <div class="col-xl-6">
        <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
            <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                style="min-height: 400px; ">
                  <div id="chartContainer"  > </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
              <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                  style="min-height: 400px; ">
                    <div id="graflineal"  > </div>
              </div>
            </div>
          </div>
        
      </div>
    </div>
<!--Grafica por Area-->
<div class="container   mb-3 shadow-lg p-3 mb-5 bg-white rounded  " style="max-width: 100rem;">
    <div class="row">
    <div class="col-lg-12">
      <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
        <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
        style="min-height: 480px; ">
                  <div id="gporarea"> </div>
            </div>
      </div>
    </div>    
  </div>
</div> 
    

    
    <!--Fin Grafica por Area-->

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
<!-- scrip grafica -->
<script type="text/javascript">
//variables para la creacion de la grafica lineal 
          var totalMesJson = {{$totalMesJson}};
          var mesinicio = 0; //mes de inicio
          var año_x =2019;
//variables para la creacion de la grafica lineal 

window.onload = function (){


              var dataLength = 0;             
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
      										text: "  Tickets {{$ticket}}  ",
                          
      									},

      									legend:{
                      		horizontalAlign: "right",
                      		verticalAlign: "center",
                          cursor: "pointer",
                          itemclick: explodePie,
                          
                          
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
                           { label: "Tickets Cerrados Exitosamente-{{$rticket }} ", y: {{$rticket }}  },
                           { label: "Tikets cerradoinex-{{$cerradocinEX }} ", y: {{$cerradocinEX }}  },
                           { label: "Tikets Abierto-{{ $open}} ", y: {{ $open}}  },
                           
                           { label: "Tikets Cerrado por Tiempo-{{$cerradoPT }} ", y: {{$cerradoPT }}  },
                           { label: "Tikets Notificado-{{$notificadoalU }} ", y: {{$notificadoalU }}  },
                           { label: "Tikets Asignado- {{$asignado }}", y: {{$asignado }}  },
                           { label: "Tikets Atendido-{{$atendido }} ", y: {{$atendido }}  },
                           { label: "Tikets espera de informacion-{{$espinformacion }} ", y: {{$espinformacion }}  },
                           
                           { label: "Tikets En Tramite - {{$Entramite}} ", y: {{$Entramite }}  },
                           { label: "Tikets falta Documentar - {{$FaltaDocumentar}} ", y: {{$FaltaDocumentar }}  },
                           { label: "Tikets Falta Acta Res - {{$FalteActaRES}} ", y: {{$FalteActaRES }}  },

      										 ]
      									 }
      									 ]
      								 });
                       chart.render();
                                         
// SEPARADOR

//Grafica por Area 

  var chart = new CanvasJS.Chart("gporarea",{
                                              animationEnabled: true,
                                              animationDuration: 1000,
                                              interactivityEnabled: true,
                                              exportEnabled: true,
                                              height:500,
                                              width:1050,
                                              horizontalAlign:"center",
                                              
                                              
    
                                              title:{
                                                 
                                                  text: "Tickets Por Area ",
                                                  fontSize: 30,
                                                  

                                              },
    
                             legend:{
                              fontSize: 12,
                              horizontalAlign: "left", // left, center ,right 
                              verticalAlign: "center",  // top, center, botto
                              itemWrap: false,
                              itemWidth: 100,
                              cursor: "pointer",
                              itemclick: explodePie,
                                  
                               },

                              
                             data: [//array of dataSeries
                                   { //dataSeries object
                                   /*** Change type "column" to "bar", "area", "line" or "pie"***/
                                     type: "pie",
                                     showInLegend: true,
                                     legendText: "{label}",
                                     indexLabel: "{label} - #percent%",
                                     
                                     
                                     
    
                            dataPoints: [
                               
                               { label: "PostMaster", y: {{$tk_por_area_1}}  },
                               { label: "Mesa de Servicio Raw", y: {{$tk_por_area_2}}  },
                               { label: "Junk", y: {{$tk_por_area_3}}  },
                               { label: "Misc", y: {{$tk_por_area_4}}  },  
                               //junk sistemas 32 no se agrego en espera
                               { label: "Cuentas de Email", y: {{$tk_por_area_6}}  },
                               { label: "Mesa de Servicio CDA", y: {{$tk_por_area_7}}  },
                               { label: "ST", y: {{$tk_por_area_8}}  },
                               { label: "ST::ST-Zocalo", y: {{$tk_por_area_9}}  },
                               { label: "Junk::Sistemas6", y: {{$tk_por_area_10}}  },
                               { label: "ST::ST-Lavista", y: {{$tk_por_area_11}}  },
                               { label: "ST::CS-Tlatelolco", y: {{$tk_por_area_12}}  },
                               { label: "ST::ST-Viaducto", y: {{$tk_por_area_13}}  },
                               { label: "ST::ST-Tlaxcoaque", y: {{$tk_por_area_14}}  },
                               { label: "Normatividad", y: {{$tk_por_area_15}}  },
                               { label: "ST::TE-Express Pemex", y: {{$tk_por_area_16}}  },
                               { label: "DASI", y: {{$tk_por_area_17}}  },
                               { label: "ST::TE-Express Norte", y: {{$tk_por_area_18}}  },
                               { label: "Cancelaciones", y: {{$tk_por_area_19}}  },
                               { label: "DECSI", y: {{$tk_por_area_20}}  },
                               { label: "ST::ST-DGPI", y: {{$tk_por_area_21}}  },
                               { label: "DECSI::Infraestructura", y: {{$tk_por_area_22}}  },
                               { label: "Seguridad Informática", y: {{$tk_por_area_23}}  },
                               { label: "DASI::Impresión", y: {{$tk_por_area_24}}  },
                               { label: "ST::ST-Procuraduría Fiscal", y: {{$tk_por_area_25}}  },
                               { label: "DECSI::Servidores", y: {{$tk_por_area_26}}  },
                               { label: "ST::ST-Fiscalización", y: {{$tk_por_area_27}}  },
                               { label: "DECSI::Redes", y: {{$tk_por_area_28}}  },
                               { label: "ST::ST-SAT", y: {{$tk_por_area_29}}  },
                               { label: "DASI::Incidentes Informáticos", y: {{$tk_por_area_30}}  },
                               { label: "Mesa de Servicio", y: {{$tk_por_area_31}}  },
                               { label: "Sistemas::SSP", y: {{$tk_por_area_32}}  },
                               { label: "ST::ST-Egresos", y: {{$tk_por_area_33}}  },
                               { label: "Junk::Sistemas7", y: {{$tk_por_area_34}}  },
                               { label: "Sistemas", y: {{$tk_por_area_35}}  },
                               { label: "Capital-Humano", y: {{$tk_por_area_36}}  },
                               { label: "Sistemas::CDA", y: {{$tk_por_area_37}}  },
                               { label: "ST::ST-KATS", y: {{$tk_por_area_38}}  },
                               { label: "ST::ST-Fray Servando", y: {{$tk_por_area_40}}  },
                               { label: "Junk::Sistemas9", y: {{$tk_por_area_41}}  },
                               { label: "Junk::Sistemas13", y: {{$tk_por_area_42}}  },
                               { label: "Sistemas::CDSI", y: {{$tk_por_area_43}}  },
                               { label: "Junk::Sistemas3", y: {{$tk_por_area_44}}  },
                               { label: "Junk::Sistemas5", y: {{$tk_por_area_45}}  },
                               { label: "Mesa de Servicio CDSI", y: {{$tk_por_area_46}}  },
                               { label: "Junk::Sistemas4", y: {{$tk_por_area_47}}  },
                               { label: "Junk::Sistemas8", y: {{$tk_por_area_48}}  },
                               { label: "Sistemas::Rcubica IT", y: {{$tk_por_area_49}}  },
                               { label: "Sistemas::Consultoría SAP-GRP", y: {{$tk_por_area_50}}  },
                               { label: "Sistemas::SPAS", y: {{$tk_por_area_51}}  },
                               { label: "Sistemas::DECSI", y: {{$tk_por_area_52}}  },
                               { label: "Sistemas::DGTIC", y: {{$tk_por_area_53}}  },
                               { label: "DASI::Email", y: {{$tk_por_area_54}}  }, 
                            ]
                         }]
  });
      chart.render();



function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}

  for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
		e.dataSeries.dataPoints[i].color = (e.dataSeries.dataPoints[i].exploded) ? "#242424" : null;
	}
	e.chart.render();
}
    

  // Fin Grafica por mes


var chart = new CanvasJS.Chart("chartContainer4",{
                animationEnabled: true,
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
      name: "2020",
  		type: "area",
  		color: "#369EAD",
  		showInLegend: true,
  		axisYIndex: 1,
      dataPoints: [
        //imprecion de php 

              {x:new Date(2020,00,00), y: {{$mes_enero2}} },
              {x:new Date(2020,01,00), y: {{$mes_febrero2}} },
              {x:new Date(2020,02,00), y: {{$mes_marzo2}} },
              {x:new Date(2020,03,00), y: {{$mes_abril2}} },
              {x:new Date(2020,04,00), y: {{$mes_mayo2}} },
              {x:new Date(2020,05,00), y: {{$mes_junio2}} },
              {x:new Date(2020,06,00), y: {{$mes_julio2}} },
              {x:new Date(2020,07,00), y: {{$mes_agosto2}} },
              {x:new Date(2020,08,00), y: {{$mes_septiembre2}} },
              {x:new Date(2020,09,00), y: {{$mes_octubre2}} },
              {x:new Date(2020,10,00), y: {{$mes_noviembre2}} },
              {x:new Date(2020,11,00), y: {{$mes_diciembre2}} },
      ]
  	},
  	{
      name: "2021",
  		type: "area",  		
  		color: "#C24642",
  		axisYIndex: 1,
  		showInLegend: true,
      dataPoints: [
              {x:new Date(2021,00,00), y: {{$mes_enero}} },
              {x:new Date(2021,01,00), y: {{$mes_febrero}} },
              {x:new Date(2021,02,00), y: {{$mes_marzo}} },
              {x:new Date(2021,03,00), y: {{$mes_abril}} },
              {x:new Date(2021,04,00), y: {{$mes_mayo}} },
              {x:new Date(2021,05,00), y: {{$mes_junio}} },
              {x:new Date(2021,06,00), y: {{$mes_julio}} },
              {x:new Date(2021,07,00), y: {{$mes_agosto}} },
              {x:new Date(2021,08,00), y: {{$mes_septiembre}} },
              {x:new Date(2021,09,00), y: {{$mes_octubre}} },
              {x:new Date(2021,10,00), y: {{$mes_noviembre}} },
              {x:new Date(2021,11,00), y: {{$mes_diciembre}} },

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
               markerType:"circle",
               type: "column",
               ilegendText: "{label}",

               dataPoints: [



                 { label: "Tikets Totales", y: {{ $ticket}}  },
                 { label: "Tickets Cerrados Exitosamente", y: {{$rticket}} },
                 { label: "Tickets Asignados", y: {{$asignado}} },
                 { label: "Tickets Cerrados por Tiempo", y: {{$cerradoPT}} },
                 { label:  "Tickets Notificados", y: {{$notificadoalU}} },
                 {label: "Tickets en Tramite" , y:{{$Entramite}}  }
                 ]
             }
             ]
         });
     chart.render();
     

     // Separador 3 construccion

  var chart = new CanvasJS.Chart("sales-doughnut-chart-us",
       {
         animationEnabled: true,
          

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
                { y:  {{$rticket}} , name: "Tickets Cerrados Exitosamente", color: "#1F842F" ,toolTipContent:null}
                ]
            }
            ]
        });
    chart.render();
   


    var chart = new CanvasJS.Chart("sales-doughnut-chart-de",
         {
           animationEnabled: true,
            

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





//Grafica Lineal AÑo - Mes cada segundo  

var dataPoints = [{x: new Date(año_x, mesinicio), y: totalMesJson[ndia]}];
var chart = new CanvasJS.Chart("graflineal", {
        zoomEnabled: true,
        exportEnabled: true,

         // theme: "dark2", // cambi el tema de la  grafica 
        
        title : {
          text : "Dynamic Data"
        }, 
        data : [{
            type : "splineArea",
            color: "rgba(40,175,101,0.6)",
            dataPoints : dataPoints
          }
        ]
      });
  
    chart.render();
    
    var updateCount = 0;
    var ndia =0;

// Actualizando y agregando atos  
var updateChart = function () {
 
  var cantidadmes=
// dato  que se va a ir ingresando 
      dataPoints.push({
        x: new Date(año_x, mesinicio), 
        y: totalMesJson[ndia], 
      });
      updateCount++;
      ndia++;
//dato  que se va a ir ingresando  en el eje x 

if (año_x=={{$año}} & mesinicio=={{$mes}}) {
  mesinicio=6;
}else if (mesinicio<=12 ) {
  mesinicio++;
  chart.options.title.text = "Grafica Mes - Año " + año_x;

}
if (mesinicio==12) {
    mesinicio=0; 
    if (año_x < {{$año}}){
      año_x++;
    }   
  }
chart.render();             
};

// Fin Actualizando y agregando Datos  




// se carga la grafica cada segundo
setInterval(function(){updateChart()}, 1000); 
// Fin se carga la grafica cada segundo  
//Fin Grafica Lineal AÑo - Mes cada segundo 
     
};


var nuevotk = [
  "Ultimo Ticket ingresado {{$ultimoTK->tn}}  /  {{$ultimoTK->create_time}}  .  .  ." 
],
  x = 0,
  y = 0,
 num = 100,
  news = document.getElementById("news2"),
  last = setInterval(function() {
    news.textContent += nuevotk[y][x++] ; 
      if(x > nuevotk[y].length) { 
        x = 0;
        news.textContent = "";              
      }  
  },num );

  function oneClick(e) {
    
    
  }
  






</script>




@endsection
@endsection
