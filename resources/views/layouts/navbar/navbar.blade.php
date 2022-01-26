<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside" >
   <!-- begin:: Aside -->
   <!-- <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand"> -->
      <div class="kt-aside__brand-logo">
         <a href="{{ url('/') }}">
            <img alt="Logo" src="{{ URL::asset('assets/media/company-logos/logotipo_SAF-01.svg'.env('APP_LOGO_ASIDE') ) }}" width="251px" style="padding-top: 5px " > 
         </a>
      </div>
      
   <!-- </div> -->
   <!-- end:: Aside -->
   <!-- begin:: Aside Menu -->
   <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid fondolateral" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">

         <ul class="kt-menu__nav ">
            @can('SuperAdmin') 
            @endCan
            <li class="kt-menu__section  " >
               <h4 class="kt-menu__section-text">Menu </h4>
               <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>


            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24" />
                           <rect id="Rectangle-7" fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                           <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                        </g>



            </svg></span><span class="kt-menu__link-text">Estatus Tickets</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
               <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Utils</span></span></li>
      
         
             
            <div class="container">
              <ul class="mcd-menu">
                <li>
                  <a class=" nav-link admin dash" href="{{url('/admin')}}" >
                     <strong >Principal</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"/>
                

                <li>
                  <a class=" nav-link tickets_abiertos" href="{{url('users/tickets_abiertos')}}" >
                     <strong>Tickets Abierto </strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                
                <li>
                  <a class=" nav-link tks_asignados" href="{{url('users/tks_asignados')}}" >
                   <strong>Tickets  Asignados</strong>                  
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a  class=" nav-link tks_atendidos" href="{{url('users/tks_atendidos')}}" > <strong>Tickets Atendidos </strong> </a>
                </li>
                <hr size="2px"  noshade="noshade"  />

                <li>
                  <a class=" nav-link tickets_cerradosEX" href="{{url('users/tickets_cerradosEX')}}">
                     <strong>Tickets Cerrados Exitosamente</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                

                <li>
                  <a class=" nav-link tickets_cerradosPT" href="{{url('users/tickets_cerradosPT')}}">
                     <strong>Tickets Cerrado por Tiempo</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a  class=" nav-link tickets_espera_inf" href="{{url('users/tickets_espera_inf')}}" > <strong>Tickets Espera de Información</strong> </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a class=" nav-link tickets_falta_acta_responsiva" href="{{url('users/tickets_falta_acta_responsiva')}}">
                     <strong>Ticket Falta Acta Responsiva</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"/>

                <li>
                  <a class=" nav-link tickets_notificado_al_Usuario" href="{{url('users/tickets_notificado_al_Usuario')}}">
                     <strong>Tickets Notificado al Usuario </strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a class=" nav-link tickets_pendiente" href=" {{url('users/tickets_pendiente')}}" > <strong>Tickets Pendientes </strong> </a>
                </li>
                <hr size="2px"  noshade="noshade"  />

                <li>
                  <a class=" nav-link grafic" href="{{url('users/grafic')}}" >
                     <strong>Tickets Totales</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />    
               </ul>
            </div>
            </li>
         </ul>
      </div> 

   

            <!--Creacion de lista para consumibles   -->
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--close" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <rect id="bound" x="0" y="0" width="24" height="24" />
                     <rect id="Rectangle-7" fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                     <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                  </g>
               </svg></span><span class="kt-menu__link-text">Reportes/Consumibles</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
               <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Consumibles</span></span></li>
                     
                     <div class="container">
                        <ul class="mcd-menu">
                           
                            <li>
                               <a class=" nav-link tickets_sol_toner" href="{{url('users/tkt_pru_toner')}}"><strong>Tickets Solicitud de Toner</strong>(Situacion entrega de Toner  )</a>
                            </li>
                            
                        </ul>
                     </div>

                  </ul>
               </div>
            </li>
<!-- Fin Creacion de lista para consumibles   -->

<!-- Monitoreo de TKS -->
<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--close" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
   <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
         <rect id="bound" x="0" y="0" width="24" height="24" />
         <rect id="Rectangle-7" fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
         <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
      </g>
   </svg></span><span class="kt-menu__link-text">Monitoreo De Tkts</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
   <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
      <ul class="kt-menu__subnav">
         <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Consumibles</span></span></li>
         
         <div class="container">
            <ul class="mcd-menu">
               <li>
                  
                  <a class=" nav-link monitoreotks" href=" {{url('users/monitoreotks')}}"> <strong>Monitoreo de TIKETS </strong>  (operadores)</a>
                  
                </li>
            </ul>
         </div>

      </ul>
   </div>
</li>

<!--Fin Monitoreo de TKTS --> 




            
      
          
   </div> 
   </div>










   



   <!-- end:: Aside Menu -->
</div>
<!-- end:: Aside -->



