@extends('layouts.inventory.app')
@inject('provider','App\Http\Controllers\Inventory\Setting\Provider\ProviderController')
@section('title')
Transacciones 
@stop
@section('breadcrumb')
    <li><a href="/">Principal</a></li>
    <li>Inventario</li>
    <li>Transacciones</li>
    <li class="active">Ingreso de Productos</li>
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
                        Ingreso de Productos
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Registro de entradas de producto, editar registro, eliminar registro y lista de los registros
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="clearfix">
                    <p>
                    <button type="button" id="save_input" title="Guardar ingreso de productos"class="btn btn-white btn-info btn-round"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Guardar [F2]</button>
                    <button type="button" id="cancel_input" title="Cancelar ingreso de productos" class="btn btn-white btn-default btn-round"><i class="ace-icon fa fa-times red2"></i>Cancelar [F4]</button>
                    </p>
                </div>
                <div class="row ">
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="clearfix">
                                                        <label for="provider_id">Proveedor:</label>
                                                        <select class="form-control select2" name="provider_id" id="provider_id" data-placeholder="Selecione Proveedor" required>
                                                            <option value="">  </option>
                                                            @foreach ($provider->show('select') as $value)
                                                        <option value="{{ $value->id }}">{{ $value->nit}} - {{ $value->name}}</option>
                                                    @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="clearfix">
                                                        <label for="branch_office_id">Sucursal</label>
                                                        <select class="form-control select2" name="branch_office_id" id="branch_office_id" data-placeholder="Seleccione Sucursal" required>
                                                            <option value="">  </option>
                                                            <option value="A">Sucursal 1</option>
                                                            <option value="K">Sucursal 2</option>
                                                            <option value="K">Sucursal 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label for="date_entry">Fecha</label>
                                        <div class="input-group">
                                         <input class="form-control date-picker" id="date_entry" name="date_entry" type="text" data-date-format="dd-mm-yyyy" />
                                            <span class="input-group-addon">
                                             <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                        <label for="description_input">Gloza:</label>
                        <textarea class="form-control" id="description_input" name="description_input" placeholder="Escriba una descripcion de la transaccion"></textarea>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="pull-left tableTools-container">
                        <div class="btn-group">
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
                                        <a href="#" onclick="transfer.table('/warehouse/transfer/active','');return false;">Activos</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="transfer.table('/warehouse/transfer/delete','');return false;">Eliminados</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="transfer.table('/warehouse/transfer/all','');return false;">Todos</a>
                                    </li>
                                </ul>
                            </div><!-- /.btn-group -->
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-4">
                    <table class="table table-striped table-bordered table-hover" id="table_list">
                        <thead>
                            <tr>
                                <th>
                                    SKU/Codigo
                                </th>
                                <th>
                                    Nombre Producto
                                </th>
                                <th>
                                    Agregar
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                        <footer>
                            <tr>
                                <th>
                                    SKU/Codigo
                                </th>
                                <th>
                                    Nombre Producto
                                </th>
                                <th>
                                    Agregar
                                </th>
                            </tr>
                        </footer>
                    </table>
                </div>
                <div class="col-xs-8">
                    <table class="table table-striped table-bordered table-hover" id="table_list">
                        <thead>
                            <tr>
                                <th>
                                    Cod-Entrada
                                </th>
                                <th>
                                    Nombre Producto
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Precio/Unit.
                                </th>
                                <th>
                                    Total
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                        <footer>
                            <tr>
                                <th>
                                    Cod-Entrada
                                </th>
                                <th>
                                    Nombre Producto
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Precio/Unit.
                                </th>
                                <th>
                                    Total
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
    
    <!--End Modal crate client-->
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
    <script src="{{ URL::asset('/scripts/inventory/transaction/entry.js')}}"></script>
@stop