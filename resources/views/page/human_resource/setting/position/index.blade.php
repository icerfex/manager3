@extends('layouts.human_resource.app')
@section('title')
Listado de clientes
@stop
@section('breadcrumb')
    <li><a href="/">Principal</a></li>
    <li><a href="/human-resource">Recursos Humanos</a></li>
    <li class="active">Configuración</li>
    <li class="active">Cargo</li>
@stop
@section('styles')
    <!--Page Related styles-->
    <link rel="stylesheet" href="{{ asset('/assets/css/jquery.gritter.min.css') }}" />
@stop
@section('content')   
    <!-- Page Breadcrumb -->
    @include('layouts.breadcrumb')
    <!-- /Page Breadcrumb -->
    <!-- Page Content -->
    <div class="page-content">
        <!-- Your Content Goes Here -->
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>
                        Categoria
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Nuevo registro, editar registro, eliminar registro y lista de los registros
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="clearfix">
                    <div class="pull-left tableTools-container">
                        <div class="btn-group">
                            <button type="button" id="new_item" class="btn btn-white btn-primary message-tooltip tooltip-info" title="Formulario para agregar nuevo cliente"><i class="ace-icon fa fa-file-text-o bigger-130"></i> </button>
                            <button type="button" id="edit_item" class="btn btn-white btn-primary message-tooltip tooltip-info" title="Muestrara el formulario para editar al cliente selecionado"><i class="ace-icon fa fa-pencil-square-o bigger-130"></i> </button>
                            <button type="button" id="delete_item" class="btn btn-white btn-primary message-tooltip tooltip-error" title="Se eliminara al cliente selecionado"><i class="ace-icon fa fa-trash-o bigger-130"></i></button>
                        </div>
                        <div class="btn-group">
                            <div class="btn-group">
                                <button data-toggle="dropdown" title="Generar una reporte de clientes en formato PDF" class="btn btn-primary btn-white dropdown-toggle message-tooltip">
                                    Reporte
                                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-130"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/client/report/active" target="_blank">Activos</a>
                                    </li>
                                    <li>
                                        <a href="/client/report/delete" target="_blank">Eliminados</a>
                                    </li>
                                    <li>
                                        <a href="/client/report/all" target="_blank">Todos</a>
                                    </li>
                                </ul>
                            </div><!-- /.btn-group -->
                            <div class="btn-group">
                                <button data-toggle="dropdown" title="Muestra un lista de clientes" class="btn btn-primary btn-white dropdown-toggle message-tooltip">
                                    Lista
                                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-130"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" onclick="category.table('/inventory/setting/category/active','');return false;">Activos</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="category.table('/inventory/setting/category/delete','');return false;">Eliminados</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="category.table('/inventory/setting/category/all','');return false;">Todos</a>
                                    </li>
                                </ul>
                            </div><!-- /.btn-group -->
                        </div>
                    </div>
                </div>
                
                <div>
                    <table class="table table-striped table-bordered table-hover" id="table_list">
                        <thead>
                            <tr>
                                <th class="center">
                                    <label class="pos-rel"> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label>
                                </th>
                                <th>
                                    Codigo
                                </th>
                                <th>
                                    Abr
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Fecha de creacion
                                </th>
                                <th>
                                    Fecha de modificacion
                                </th>
                                <th>
                                    Estado
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                        <footer>
                            <tr>
                                <th>
                                </th>
                                <th>
                                    Codigo
                                </th>
                                <th>
                                    Abr
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Fecha de creacion
                                </th>
                                <th>
                                    Fecha de modificacion
                                </th>
                                <th>
                                    Estado
                                </th>
                            </tr>
                        </footer>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
    <!--Modal crate client-->
    @include('page.human_resource.setting.position.form_save_position')
    <!--End Modal crate client-->
    <!--Modal edit client-->
    @include('page.human_resource.setting.position.form_edit_position')
    <!--End Modal edit client-->
@stop

@section('scripts')
    <!-- page specific plugin scripts -->
    <script src="{{ URL::asset('/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/dataTables.select.min.js') }}"></script>
    
    <script src="{{ URL::asset('/assets/js/bootbox.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.gritter.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.inputmask.bundle.min.js') }}"></script>
    
    <script src="{{ URL::asset('/scripts/master.js')}}"></script>
    <script src="{{ URL::asset('/scripts/human_resource/setting/position/position.js')}}"></script>
@stop