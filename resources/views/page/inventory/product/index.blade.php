@extends('layouts.inventory.app')
@inject('unit','App\Http\Controllers\Inventory\Setting\Unit\UnitController')
@inject('category','App\Http\Controllers\Inventory\Setting\Category\CategoryController')
@inject('subcategory','App\Http\Controllers\Inventory\Setting\SubCategory\SubcategoryController')
@section('title')
    Pagina de inicio
@stop
@section('breadcrumb')
    <li><a href="/">Principal</a></li>
    <li>Almacen</li>
    <li class="active">Item</li>
@stop
@section('styles')
    <!--Page Related styles-->
    <link rel="stylesheet" href="{{ asset('/assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/jquery.gritter.min.css') }}" />
@stop
@section('content')   
    <!-- Page Breadcrumb -->
    @include('layouts.breadcrumb')
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-content">
        <!-- Your Content Goes Here -->
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                <h1>
                    Almacen
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Crear, editar, eliminar ver su kardex y ver la lista de product registrados
                    </small>
                </h1>
                </div><!-- /.page-header -->
                
                <div class="clearfix">
                    <div class="pull-left tableTools-container">
                        <div class="btn-group">
                            <button type="button" id="new_product" class="btn btn-white btn-primary message-tooltip tooltip-info" title="Formulario para agregar nuevo producte"><i class="ace-icon fa fa-file-text-o bigger-130"></i></button>
                            <button type="button" id="edit_product" class="btn btn-white btn-primary message-tooltip tooltip-info" title="Muestrara el formulario para editar al producte selecionado"><i class="ace-icon fa fa-pencil-square-o bigger-130"></i></button>
                            <button type="button" id="delete_product" class="btn btn-white btn-primary message-tooltip tooltip-error" title="Se eliminara al producte selecionado"><i class="ace-icon fa fa-trash-o bigger-130"></i></button>
                            <button type="button" id="kardex_product" class="btn btn-white btn-primary message-tooltip tooltip-info" title="Mostrara los productos mas comprados por el producte selecionado"><i class="ace-icon fa fa-book bigger-130"></i></button>
                        </div>
                        <div class="btn-group">
                            <div class="btn-group">
                                <button data-toggle="dropdown" title="Generar una reporte de productes en formato PDF" class="btn btn-primary btn-white dropdown-toggle message-tooltip">
                                    Reporte
                                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-130"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/product/report/active" target="_blank">Activos</a>
                                    </li>
                                    <li>
                                        <a href="/product/report/delete" target="_blank">Eliminados</a>
                                    </li>
                                    <li>
                                        <a href="/product/report/all" target="_blank">Todos</a>
                                    </li>
                                </ul>
                            </div><!-- /.btn-group -->
                            <div class="btn-group">
                                <button data-toggle="dropdown" title="Muestra un lista de productes" class="btn btn-primary btn-white dropdown-toggle message-tooltip">
                                    Lista
                                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-130"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" onclick="product.table('/warehouse/product/active','');return false;">Activos</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="product.table('/warehouse/product/delete','');return false;">Eliminados</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="product.table('/warehouse/product/all','');return false;">Todos</a>
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
                                    Imagen
                                </th>
                                <th>
                                    Codigo
                                </th>
                                <th>
                                    Categoria/Subcategoria
                                </th>
                                <th>
                                    Unidad
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Fecha
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>
                                    Imagen
                                </th>
                                <th>
                                    Codigo
                                </th>
                                <th>
                                    Categoria/Subcategoria
                                </th>
                                <th>
                                    Unidad
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Fecha
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
        </div>
        <div class="horizontal-space"></div>
    </div>
    <!-- /Page Body -->
    <!--Modal register warehouse/product-->
    @include('page.inventory.product.form_save_product')
    <!--End Modal register warehouse/product-->
    <!--Modal edit warehouse/product-->
    @include('page.inventory.product.form_edit_product')
    <!--End Modal edit warehouse/product-->
    <!--Modal list -->
    @include('page.inventory.product.list')
    <!--End Modal list -->
@stop

@section('scripts')
    <!--Page Related Scripts-->
    <script src="{{ URL::asset('/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/dataTables.select.min.js') }}"></script>
    
    <script src="{{ URL::asset('/assets/js/bootbox.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.gritter.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.validate.min.js') }}"></script>

    <script src="{{ URL::asset('/scripts/master.js') }}"></script>
    <script src="{{ URL::asset('/scripts/inventory/product/item.js') }}"></script>
    <script src="{{ URL::asset('/scripts/inventory/product/item_list.js') }}"></script>
 
    <script>
        jQuery(document).ready(function($) {
            $('#image').ace_file_input({
                no_file:'Sin archivo ...',
                btn_choose:'Seleccionar',
                btn_change:'Cambiar',
                droppable:false,
                onchange:null,
                thumbnail:false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });

            $('#edit_image').ace_file_input({
                no_file:'Sin archivo ...',
                btn_choose:'Seleccionar',
                btn_change:'Cambiar',
                droppable:false,
                onchange:null,
                thumbnail:false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });

            
        });
    </script>
@stop