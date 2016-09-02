@extends('layouts.app')
@section('title')
Listado de clientes
@stop
@section('breadcrumb')
    <li><a href="/">Principal</a></li>
    <li><a href="/client">Clientes</a></li>
    <li class="active">Kardex</li>
@stop
@section('title_head')
    Kardex de cliente: {{ $client->name }}
@stop
@section('styles')
    <!--Page Related styles-->
    <link href="{{ asset('/assets/css/dataTables.bootstrap.css')}}" rel="stylesheet" />
@stop
@section('content')   
    <!-- Page Breadcrumb -->
    @include('layouts.breadcrumb')
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    @include('layouts.header')
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <!-- Your Content Goes Here -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Lista de clientes</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="table-toolbar">
                            <div class="btn-group">
                                <div class="btn-group">
                                    <a class="btn btn-magenta shiny tooltip-magenta" data-toggle="tooltip" data-placement="top" data-original-title="Generar una lista de clientes en formato PDF<br> Más opciones<i class='fa fa-hand-o-right '></i> " href="/client/report/active" target="_blank" ><i class="fa fa-file-pdf-o"></i> Reporte</a>
                                    <a class="btn btn-magenta dropdown-toggle shiny" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu dropdown-default">
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
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-maroon shiny tooltip-maroon" data-toggle="tooltip" data-placement="top" data-original-title="Lista de clientes registrado<br> Más opciones<i class='fa fa-hand-o-right '></i> " href="#" onclick="client.table('/client/active','');return false;"><i class="fa fa-list-alt"></i> Lista</a>
                                    <a class="btn btn-maroon dropdown-toggle shiny" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu dropdown-default">
                                        <li>
                                            <a href="#" onclick="client.table('/client/active','');return false;">Activos</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="client.table('/client/delete','');return false;">Eliminados</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="client.table('/client/all','');return false;">Todos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="table_list">
                            <thead class="bordered-primary">
                                <tr>
                                    <th>
                                        <center><label>
                                            <input type="checkbox">
                                            <span class="text"></span>
                                        </label></center>
                                    </th>
                                    <th>
                                        Nit
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Teléfono
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Dirección
                                    </th>
                                    <th>
                                        Zona
                                    </th>
                                    <th>
                                        Whatsapp
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
                                        Nit
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Teléfono
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Dirección
                                    </th>
                                    <th>
                                        Zona
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                    <th>
                                        Whatsapp
                                    </th>
                                </tr>
                            </footer>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizontal-space"></div>
    </div>
    <!-- /Page Body -->
@stop

@section('scripts')
    <!--Page Related Scripts-->
    <script src="{{ URL::asset('/assets/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/datatable/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/validation/bootstrapValidator.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/toastr/toastr.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/bootbox/bootbox.js') }}"></script>

    <script src="{{ URL::asset('/scripts/master.js')}}"></script>
    <script src="{{ URL::asset('/scripts/kardex.js')}}"></script>
    <script>   
        
        
    </script>
@stop