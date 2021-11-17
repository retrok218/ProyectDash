
<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
   <!-- begin:: Header Menu -->
   <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
           class="la la-close"></i></button>
   <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
       <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

           <div class="kt-aside__brand-logo">
               <a href="{{url('/admin')}}">
                   <img alt="Logo" src="{{ URL::asset('assets/media/company-logos/logotipo_SAF-01.svg')}}" width="350"
                       style="padding-top: 1px">
               </a>
           </div>
          
       </div>
   </div>
   <!-- end:: Header Menu -->
   <!-- begin:: Header Topbar -->
   
   <div class="kt-header__topbar">
       <!--begin: User Bar -->
    
       <div class="kt-header__topbar-item kt-header__topbar-item--user">
           <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
               <div class="kt-header__topbar-user "> 
                <span class="kt-header__topbar-welcome kt-hidden-mobile">Bienvenido,</span>
                <span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::user()->usuario }} </span>    
                   <span
                       class="kt-hidden kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>   
                </div>
                    <div class="arrow">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
               
           </div>
           <div
               class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
               <!--begin: Head -->
               
               <!--end: Head -->
               <!--begin: Navigation -->
               <div class="kt-notification">
                   <a href="{{url('users/profile')}}" class="kt-notification__item">
                       <div class="kt-notification__item-icon">
                           <i class="flaticon2-calendar-3 kt-font-success"></i>
                       </div>
                       <div class="kt-notification__item-details">
                           <div class="kt-notification__item-title kt-font-bold">
                               Mi Perfil
                           </div>
                           <div class="kt-notification__item-time">
                               Configuración de la cuenta
                           </div>
                       </div>
                   </a>
                                     
                   <input type="hidden" id='nombre'name="nombre" value="{{Auth::user()->name}}">
                   <input type="hidden" id='avatar'name="avatar" value="{{Auth::user()->avatar}}">
                    
                   <a href="javascript:void(0);" onclick="bloquea_pantalla();" class="kt-notification__item">
                       <div class="kt-notification__item-icon">
                           <i class="flaticon2-lock kt-font-brand"></i>
                       </div>
                       <div class="kt-notification__item-details">
                           <div class="kt-notification__item-title kt-font-bold">
                               Bloquear Pantalla
                           </div>
                           <div class="kt-notification__item-time">
                               
                           </div>
                       </div>
                   </a>

            
                   <!-- Para continuar con el listado del Perfil -->
                   <div class="kt-notification__custom kt-space-between">
                       <!--<a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>-->
                       <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           {{ __('Salir') }}
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                   </div>
               </div>
               <!--end: Navigation -->
           </div>
       </div>
       <!--end: User Bar -->


   </div>
   <!-- end:: Header Topbar -->
</div>
<!-- end:: Header -->