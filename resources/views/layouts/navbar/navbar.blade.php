<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside" >
   <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand"> 
      <div class="kt-aside__brand-logo">
         <a href="{{ url('/') }}">
            <img alt="Logo" src="{{ URL::asset('assets/media/company-logos/logotipo_SAF-01.svg'.env('APP_LOGO_ASIDE') ) }}" width="230px" style="padding-top: 5px " > 
         </a>
      </div>

   <!-- boton de retraccion -->
   <div class="kt-aside__brand-tools">
         <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler" title="Reducir">
            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                     <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                     <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                  </g>
               </svg></span>
            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                     <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                     <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
               </svg></span>
         </button>
      </div>

      <!-- boton de retraccion -->






      
    </div> 
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
               
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle" title="Contraeer">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24" />
                           <rect id="Rectangle-7" fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                           <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                        </g>
               </svg>
            </span>
               <span class="kt-menu__link-text">Estatus Tickets</span>
               <i class="kt-menu__ver-arrow la la-angle-right" title="Desplegar"></i>
         </a>
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
                  <a class=" nav-link tickets_abiertos" href="{{url('/tickets_abiertos')}}" >
                     <strong>Tickets Abierto </strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                
                <li>
                  <a class=" nav-link tks_asignados" href="{{url('/tks_asignados')}}" >
                   <strong>Tickets  Asignados</strong>                  
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a  class=" nav-link tks_atendidos" href="{{url('/tks_atendidos')}}" > <strong>Tickets Atendidos </strong> </a>
                </li>
                <hr size="2px"  noshade="noshade"  />

                <li>
                  <a class=" nav-link tickets_cerradosEX" href="{{url('/tickets_cerradosEX')}}">
                     <strong>Tickets Cerrados Exitosamente</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                

                <li>
                  <a class=" nav-link tickets_cerradosPT" href="{{url('/tickets_cerradosPT')}}">
                     <strong>Tickets Cerrado por Tiempo</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a  class=" nav-link tickets_espera_inf" href="{{url('/tickets_espera_inf')}}" > <strong>Tickets Espera de Información</strong> </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a class=" nav-link tickets_falta_acta_responsiva" href="{{url('/tickets_falta_acta_responsiva')}}">
                     <strong>Ticket Falta Acta Responsiva</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"/>

                <li>
                  <a class=" nav-link tickets_notificado_al_Usuario" href="{{url('/tickets_notificado_al_Usuario')}}">
                     <strong>Tickets Notificado al Usuario </strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />
                <li>
                  <a class=" nav-link tickets_pendiente" href=" {{url('/tickets_pendiente')}}" > <strong>Tickets Nuevos </strong> </a>
                </li>
                <hr size="2px"  noshade="noshade"  />

                <li>
                  <a class=" nav-link grafic" href="{{url('/grafic')}}" >
                     <strong>Tickets Totales</strong> 
                  </a>
                </li>
                <hr size="2px"  noshade="noshade"  />    
               </ul>
            </div>
            </li>
         </ul>
      </div> 

   

            
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
                               <a class=" nav-link tickets_sol_toner" href="{{url('/tkt_pru_toner')}}"><strong>Tickets Solicitud de Toner</strong>(Situacion entrega de Toner  )</a>
                            </li>
                            
                        </ul>
                     </div>

                  </ul>
               </div>
            </li>


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
                  
                  <a class=" nav-link monitoreotks" href=" {{url('/monitoreotks')}}"> <strong>Monitoreo de TIKETS </strong>  (operadores)</a>
                  
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



