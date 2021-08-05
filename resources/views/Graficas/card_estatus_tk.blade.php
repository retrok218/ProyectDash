
<div class="row shadow-lg p-3 mb-5  rounded ">
    <!--Carts de estatus de tks -->
    <div class="col-xl-12 fondo1">
      <div class="card-deck mt-3 " >
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h3>Tickets Totales</h3> </div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
            </div>
            <a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
        </div>

        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h3>Tickets Estatus Asignados</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px " id="btAsignados"> {{ $asignado}} </i> </div>
          </div>
          <a href="{{url('users/tks_asignados')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
        </div>

        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h3>Tickets Estatus Atendidos</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $atendido}} </i> </div>
          </div>
          <a href="{{url('users/tks_atendidos')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
        </div>
      </div>

      <div class="card-deck mt-3">
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h3>Tickets  Estatus Pendientes</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $pendienteatc}} </i> </div>
          </div>
          <a href=" {{url('users/tickets_pendiente')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>

        </div>
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h3>Tickets  Solicitud de Toner</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $solicitudroner}} </i> </div>
          </div>
          <a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>

        </div>
        <div class="card text-center  mb-3 bg-white" >

          <div class="card-header"><h3>Tickets  Estatus En Espera de Informaicon</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $espinformacion}} </i> </div>
          </div>
          <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
        </div>    
      </div>

      <!--Nuevos Status-->
      <div class="card-deck mt-3">
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h3>Tickets Cerrados Exitosamente</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $pendienteatc}} </i> </div>
          </div>
          <a href=" {{url('users/tickets_pendiente')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>

        </div>
        <div class="card text-center  mb-3 bg-white" >
          <div class="card-header"><h3>Tickets Falta de Acta Responsiva</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $solicitudroner}} </i> </div>
          </div>
          <a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>

        </div>
        <div class="card text-center  mb-3 bg-white" >

          <div class="card-header"><h3>Tickets Abierto</h3> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $espinformacion}} </i> </div>
          </div>
          <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>
        </div>    
      </div>

      <!-- Fin nuevos status-->


    </div>

    <!-- FinCarts de estatus de tks -->

    </div>

    