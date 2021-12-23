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
          <div class="card-header"><h4>Tickets Atendidos </h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$atendido}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
      </div>

     
<!-- Grafica Tickets Atendidos -->
<!--
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
      -->
<!-- Creacion de graica tickets atendidos -->

      <div class="row">
        <div class="col-xl-12">
          <div class="card ">
            <div class="card text-center"  >
            <div class="card-header titulo_card"><h2> Tickets Atendido </h2> </div>
            </div>
  <!--begin: Datatable -->

            <div class="card-body" >  
              
            Date: <input id="Date_search" type="text" placeholder="Search by Date" /><br>

                <table id="tablatk"  class="table table-striped table-bordered " >
                    <thead >
                      <tr>
                        <th>N Ticket</th>
                        <th> Creado </th>
                        <th> Asunto </th>
                        <th> Usuario </th>
                        <th> Area </th>
                        <th> Status TK</th>
                        

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tkatendidos as $tkatendidos)
                      <tr>
                        <td>{{$tkatendidos->tn}}</td>
                        <td>{{$tkatendidos->create_time}}</td>
                        <td>{{$tkatendidos->title}}</td>
                        <td>{{$tkatendidos->nombre .' '. $tkatendidos->apellido}}</td>
                        <td>{{$tkatendidos->qname}}</td>
                        <!--se cambia tecto de closed successful a Cerrado Exitosamente -->
                        @if($tkatendidos->name == 'closed successful' )
                        <td>Cerrado Exitosamente</td> 
                      @else
                      <td>{{$tkatendidos->name}}</td>
                      @endif
                  <!-- Fin del cambio de texto-->
                        

                      </tr>
                      @endforeach
                    </tbody>
                    
                </table>
              <!--end: Datatable -->
             
              </div>
              </div>

          </div>
      </div>
      </div>
      @include('layouts/scripts/scripts')
      @section('scripts')
      
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
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
$(document).ready(function() {
  $("#Date_search").val("");
});

var table = $('#tablatk').DataTable( {
  deferRender:    true, 
  "autoWidth": false,     
  "search": {
    "regex": true,
    "caseInsensitive": false,
  },});

$("#Date_search").daterangepicker({
  "locale": {
    "format": "YYYY-MM-DD",
    "separator": " to ",
    "applyLabel": "Apply",
    "cancelLabel": "Cancel",
    "fromLabel": "From",
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







@endsection
@endsection
