@extends('home')
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card-deck mt-3">
        <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
          <div class="card-header"><h3>Tickets Totales</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
          </div>
          <div class="btn-group" role="group">
  <button id="btnGroupDrop1" type="button" class="btn btn-secondary " aria-haspopup="true" aria-expanded="false">
    Desplegar
  </button>

</div>
        </div>

        <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
          <div class="card-header"><h3>Tickets Estatus Asignados</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $asignado}} </i> </div>
          </div>
        </div>

        <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
          <div class="card-header"><h3>Tickets Estatus Atendidos</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $atendido}} </i> </div>
          </div>
        </div>
      </div>

      <div class="card-deck mt-3">
        <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
          <div class="card-header"><h3>Tickets  Estatus Pendientes</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $pendienteatc}} </i> </div>
          </div>
        </div>
        <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
          <div class="card-header"><h3>Tickets  Solicitud de Toner</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $solicitudroner}} </i> </div>
          </div>
        </div>
        <div class="card text-center  mb-3 bg-white style="max-width: 18rem"">
          <div class="card-header"><h3>Tickets  Estatus En Espera de Informaicon</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $espinformacion}} </i> </div>
          </div>
        </div>

      </div>

    </div>

    </div>

@include('Graficas/tablatickets')






</div>
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
<script type="text/javascript"></script>

@endsection
@endsection
