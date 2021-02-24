@extends('home')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-user-add"></i>
            </span>
            <h3 class="kt-portlet__head-title">
               Control de Roles y Permisos asignados
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i> Exportar
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav dt_export">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Selecciona...</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:void(0)" class="kt-nav__link"  data-value="0">
                                        <i class="kt-nav__link-icon la la-copy"></i>
                                        <span class="kt-nav__link-text">Copiar</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:void(0)" class="kt-nav__link"  data-value="1">
                                        <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                        <span class="kt-nav__link-text">Excel</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:void(0)" class="kt-nav__link"  data-value="2">
                                        <i class="kt-nav__link-icon la la-file-text-o"></i>
                                        <span class="kt-nav__link-text">CSV</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:void(0)" class="kt-nav__link"  data-value="3">
                                        <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                        <span class="kt-nav__link-text">PDF</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:void(0)" class="kt-nav__link" data-value="4">
                                        <i class="kt-nav__link-icon la la-print"></i>
                                        <span class="kt-nav__link-text">Imprimir</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    &nbsp;
                    <a href="javascript:void(0);" onclick="add_new_rol();" class="btn btn-cdmx swal2-center">
                        <i class="la la-plus"></i>
                       Nuevo Rol
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-bordered table-striped" id="table-roles-permisos">
            <thead>
                <tr>
                    <th>Nombre del Rol</th>
                    <th>Permiso</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                    <td>
                    <a href="{{ URL::to('admin/roles/'.$role->id.'/editar_roles_permisos') }}" class="btn btn-cdmx swal2-center"" style="margin-right: 3px;">Editar</a>
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
$('#table-roles-permisos').dataTable();
});
</script>
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
@endsection
@endsection
