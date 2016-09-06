@extends('layouts.app')
@section('title')
Listado de clientes
@stop
@section('breadcrumb')
    <li><a href="/">Principal</a></li>
    <li><a href="/human-resource">Recursos Humanos</a></li>
    <li class="active">Configuración</li>
    <li class="active">Empleado</li>
@stop
@section('styles')
    <!--Page Related styles-->
    <link rel="stylesheet" href="{{ asset('/assets/css/jquery.gritter.min.css') }}" />
@stop
@section('content')  
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="error-container">
                    <div class="well">
                        <h1 class="grey lighter smaller">
                            <span class="blue bigger-125">
                                <i class="ace-icon fa fa-sitemap"></i>
                                404
                            </span>
                            Page Not Found
                        </h1>

                        <hr />
                        <h3 class="lighter smaller">¡Hemos buscado por todas partes pero no pudimos encontrar!</h3>

                        <div>
                            <form class="form-search">
                                <span class="input-icon align-middle">
                                    <i class="ace-icon fa fa-search"></i>

                                    <input type="text" class="search-query" placeholder="Give it a search..." />
                                </span>
                                <button class="btn btn-sm" type="button">Go!</button>
                            </form>

                            <div class="space"></div>
                            <h4 class="smaller">Pruebe uno de los siguientes:</h4>

                            <ul class="list-unstyled spaced inline bigger-110 margin-15">
                                <li>
                                    <i class="ace-icon fa fa-hand-o-right blue"></i>
                                    Estamos trabajando para mejorar el servicio
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-hand-o-right blue"></i>
                                    Contactanos
                                </li>
                            </ul>
                        </div>

                        <hr />
                        <div class="space"></div>

                        <div class="center">
                            <a href="javascript:history.back()" class="btn btn-grey">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Volver
                            </a>

                            <a href="/" class="btn btn-primary">
                                <i class="ace-icon fa fa-tachometer"></i>
                                Principal
                            </a>
                        </div>
                    </div>
                </div>

                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@stop

@section('scripts')
@stop