@extends('home')
<meta http-equiv="refresh" content="30">
@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row shadow-lg p-3 mb-5  rounded ">

        <!--Carts de estatus de tks -->
        <div class="col-xl-12 ">
            <div class="card" style="border: 1px; background: white;">   
                    <img src="{{ URL::asset('assets/media/company-logos/logotipo_SAF-01.svg'.env('APP_LOGO_ASIDE') ) }}" alt="Logo" width="850px" height="90" background="white">
                    
            </div>
            <div class="card-header text-center">
              <div class="phrase">
                <span class="words">
                  <i>Mesa de Servicio</i>
                  <i> Monitoreo de Tickets</i>
                  

                </span>
              </div>
                
            </div>
       <div class="card-deck  " >
          <div class="card text-center" style="background-color: transparent;" >   
              <div class="card-header" ><h4>Tickets Totales</h4> </div>
                <a href="{{url('users/grafic')}}">
                  <div class="card-body cardhvr" >
                       <i class="fas fa-ticket-alt" style="font-size:36px  "> {{ $ticket}} </i>
                  </div>
                </a>
                <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
          </div>
            
      
            <div class="card text-center" style="background-color: transparent; " >
              <div class="card-header " ><h4>Tickets Asignados</h4> </div>
              <a href="{{url('users/tks_asignados')}}"> 
                <div class="card-body  cardhvr">
                   <i class="fas fa-ticket-alt" style="font-size:36px " id="btAsignados"> {{ $asignado}} </i>   
                </div>
              </a>
              <!--<a href="{{url('users/tks_asignados')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
            </div>

        </div>




<div class="card-deck">
    <div class="card cardhvr">
      <div class="card-header text-center " ><h4>Tickets Atendidos</h4> </div>
      <a href="{{url('users/tks_atendidos')}}">
      <div class="card-body text-center ">
        
          <i class="fas fa-ticket-alt" style="font-size:36px"  id="btAsignados"> {{ $atendido}} </i>   
         
      </div>
      </a> 
    </div>

    <div class="card cardhvr">
      <div class="card-header text-center"><h4>Tickets Falta de Acta Responsiva</h4></div>
      <a href="{{url('users/tickets_falta_acta_responsiva')}}">
      <div class="card-body text-center">

          <i class="fas fa-ticket-alt" style="font-size:36px"  id="btAsignados"> {{$FaltaActaRES}} </i>   
         
      </div>
      </a> 
    </div>
    <div class="card cardhvr ">
      <div class="card-header text-center " ><h4>Tickets Nuevos</h4> </div>
      <a href=" {{url('users/tickets_pendiente')}}">
        <div class="card-body text-center ">
          
            <i class="fas fa-ticket-alt" style="font-size:36px"  id="btAsignados"> {{$pendienteatc}} </i>   
        </div>
      </a> 
      </div> 
    </div>
</div>




  
      
          <!--Nuevos Status-->
          <div class="card-deck mt-3">
            <div class="card text-center  mb-3 bg-white" >
      
              <div class="card-header"><h4>Tickets En Espera de Información</h4> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $espinformacion}} </i> </div>
              </div>
             <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
            </div>  
            
      
            <div class="card text-center  mb-3 bg-white" >
              <div class="card-header"><h4>Tickets Abierto</h4> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $abierto}} </i> </div>
              </div>
             <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
            </div> 
            
            <div class="card text-center  mb-3 bg-white" >
              <div class="card-header"><h4>Cerrado exitosamente</h4> </div>
              <div class="card-body">
                  <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $cerradoexitosamente}} </i> </div>
              </div>
             <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
            </div>
            
               
          </div>
      
          <div class="card-deck mt-3">
            <div class="card text-center  mb-3 bg-white" >
              <div class="card-header"><h4>Cerrado por Tiempo</h4> </div>
              <div class="card-body">
                   <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $cerradoPT}} </i> 
              </div>
              <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
            </div> 
            <div class="card text-center  mb-3 bg-white" >
              <div class="card-header"><h4>En Tramite</h4> </div>
              <div class="card-body">
                   <i class="fas fa-ticket-alt" style="font-size:36px "> {{$Entramite}} </i> 
              </div>
              <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
            </div>  
            <div class="card text-center  mb-3 bg-white" >
              <div class="card-header"><h4>Notificado al Usuario</h4> </div>
              <div class="card-body">
                   <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $NotificadoAlUsuario}} </i> 
              </div>
              <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
            </div>      
          </div>
          <!-- Fin nuevos status-->
          <!-- Boton imprecion de TArgetas -->
          
          
      
        </div>
      
        <!-- FinCarts de estatus de tks -->
      
        </div>



        @endsection


