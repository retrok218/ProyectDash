
 <div class="row shadow-lg p-3 mb-5  rounded ">

  <!--Carts de estatus de tks -->
  <div class="col-xl-12 fondo1">
    <div class="card-deck mt-3 " >
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header" ><h4>Tickets Totales</h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
          </div>
          <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div>

      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header " ><h4>Tickets Asignados</h4> </div>
        <div class="card-body ">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px " id="btAsignados"> {{ $asignado}} </i> </div>
        </div>
        <!--<a href="{{url('users/tks_asignados')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
      </div>

      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Tickets Atendidos</h4> </div>
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $atendido}} </i> </div>
        </div>
      <!--  <a href="{{url('users/tks_atendidos')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div>
    </div>
    <div class="card-deck mt-3">
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Tickets Falta de Acta Responsiva</h4> </div>
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$FaltaActaRES}} </i> </div>
        </div>
        <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div>
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Tickets Pendientes</h4> </div>
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $pendienteatc}} </i> </div>
        </div>
       <!-- <a href=" {{url('users/tickets_pendiente')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div>
      
      <div class="card text-center  mb-3 bg-white" >

        <div class="card-header"><h4>Tickets En Espera de Informción</h4> </div>
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $espinformacion}} </i> </div>
        </div>
       <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div>    
    </div>

    <!--Nuevos Status-->
    <div class="card-deck mt-3">
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Tickets Cerrados Sin Exito</h4> </div>
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $cerradosinEX }} </i> </div>
        </div>
       <!-- <a href=" {{url('users/tickets_pendiente')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->

      </div>
      

      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Tickets Abierto</h4> </div>
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $abierto}} </i> </div>
        </div>
       <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div> 
      
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Cerrado exitosamente</h4> </div>
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $cerradoexitosamente}} </i> </div>
        </div>
       <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div>
      
         
    </div>

    <div class="card-deck mt-3">
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Cerrado por Tiempo</h4> </div>
        <div class="card-body">
             <i class="fa fa-address-card" style="font-size:36px "> {{ $cerradoPT}} </i> 
        </div>
        <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
      </div> 
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>En Tramite</h4> </div>
        <div class="card-body">
             <i class="fa fa-address-card" style="font-size:36px "> {{$Entramite}} </i> 
        </div>
        <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
      </div>  
      <div class="card text-center  mb-3 bg-white" >
        <div class="card-header"><h4>Notificado al Usuario</h4> </div>
        <div class="card-body">
             <i class="fa fa-address-card" style="font-size:36px "> {{ $NotificadoAlUsuario}} </i> 
        </div>
        <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
      </div>      
    </div>
    <!-- Fin nuevos status-->


  </div>

  <!-- FinCarts de estatus de tks -->

  </div>