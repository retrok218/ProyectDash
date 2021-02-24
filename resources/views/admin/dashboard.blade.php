@extends('home')
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <!--Begin::Dashboard 1-->
                        <!--Begin::Row-->
                        <div class="row">
                            <div class="col-xl-8 order-lg-4 order-xl-1">
                                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                    <div
                                        class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Pantalla de Dashboard
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div
                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">
                                                    <!--begin::Nav-->
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__head">
                                                            Opciones para exportar
                                                            <span data-toggle="kt-tooltip" data-placement="right"
                                                                title="Click to learn more...">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1"
                                                                    class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect id="bound" x="0" y="0" width="24"
                                                                            height="24" />
                                                                        <circle id="Oval-5" fill="#000000" opacity="0.3"
                                                                            cx="12" cy="12" r="10" />
                                                                        <rect id="Rectangle-9" fill="#000000" x="11"
                                                                            y="10" width="2" height="7" rx="1" />
                                                                        <rect id="Rectangle-9-Copy" fill="#000000"
                                                                            x="11" y="7" width="2" height="2" rx="1" />
                                                                    </g>
                                                                </svg> </span>
                                                        </li>
                                                        <li class="kt-nav__separator"></li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-drop"></i>
                                                                <span class="kt-nav__link-text">Actividad</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                                                <span class="kt-nav__link-text">FAQ</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i
                                                                    class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                                                <span class="kt-nav__link-text">Configuracion</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                                                <span class="kt-nav__link-text">Soporte</span>
                                                                <span class="kt-nav__link-badge">
                                                                    <span
                                                                        class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__separator"></li>
                                                    </ul>
                                                    <!--end::Nav-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fit">
                                        <!--begin: Datatable -->
                                        <div class="kt-datatable" id="kt_datatable_latest_orders"></div>
                                        <!--end: Datatable -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                                <!--begin:: Widgets/Blog-->
                                <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                                    <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                                        <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides"
                                            style="min-height: 300px; background-image: url(./assets/media//products/product4.jpg)">
                                            <h3 class="kt-widget19__title kt-font-light">
                                               Imagen de Dashboard 2
                                            </h3>
                                            <div class="kt-widget19__shadow"></div>
                                            <div class="kt-widget19__labels">
                                                <a href="#" class="btn btn-label-light-o2 btn-bold ">Reciente</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div class="kt-widget19__wrapper">
                                            <div class="kt-widget19__content">
                                                <div class="kt-widget19__userpic">
                                                    <img src="./assets/media//users/user1.jpg" alt="">
                                                </div>
                                                <div class="kt-widget19__info">
                                                    <a href="#" class="kt-widget19__username">
                                                    Lorem Ipsum
                                                    </a>
                                                    <span class="kt-widget19__time">
                                                    Lorem Ipsum
                                                    </span>
                                                </div>
                                                <div class="kt-widget19__stats">
                                                    <span class="kt-widget19__number kt-font-brand">
                                                        18
                                                    </span>
                                                    <a href="#" class="kt-widget19__comment">
                                                        Comentarios
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="kt-widget19__text">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                scrambled a type specimen book text of the dummy text of the printing
                                                printing and typesetting industry scrambled dummy text of the printing.
                                            </div>
                                        </div>
                                        <div class="kt-widget19__action">
                                            <a href="#" class="btn btn-sm btn-label-brand btn-bold">Mas...</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Blog-->
                            </div>
                        </div>
                        <!--End::Row-->

                        <!--Begin::Row-->

                        <!--End::Row-->
                        <!--End::Dashboard 1-->
                    </div>
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
@endsection
@endsection
