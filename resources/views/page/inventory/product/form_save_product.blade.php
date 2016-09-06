<!--Modal edit warehouse/product-->
<div id="modal_product_save" class="modal modal-primary fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false;" action="{{URL::to('/inventory/product')}}" id="save_form" method="post" >
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        Nuevo Producto
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix">
                                                <label for="category_id">Selecione Categoria</label>
                                                <select data-md-selectize class="form-control select2_save" name="category_id" id="category_id" data-placeholder="Selecione Categoria" required>
                                                    <option value="">  </option>
                                                    @foreach ($category->show('select') as $value)
                                                        <option value="{{ $value->id }}">{{ $value->code}} - {{ $value->abr}}.- {{ $value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix">
                                                <label for="subcategory_id">Seleccione Subcategoria</label>
                                                <select class="form-control select2_save" name="subcategory_id" id="subcategory_id" data-placeholder="Seleccione Subcategoria" required>
                                                    <option value="">  </option>
                                                    @foreach ($subcategory->show('select') as $value)
                                                        <option value="{{ $value->id }}">{{ $value->code}} - {{ $value->abr}}.- {{ $value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix">
                                                <label for="unit_id">Seleccione Unidad</label>
                                                <select class="form-control select2_save" id="unit_id" name="unit_id" data-placeholder="Seleccione Unidad" required>
                                                    <option value="">  </option>
                                                    @foreach ($unit->show('select') as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix">
                                                <label for="order_product">Nro. Orden</label>
                                                <div class="input-group">
                                                    <input type="phone" class="form-control" id="order_product" name="order_product" placeholder="Nro. Orden" required />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-sm btn-default button_list" type="button">
                                                            <i class="ace-icon fa fa-list bigger-110"></i>
                                                            Lista
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix">
                                                <label for="name">Nombre</label>
                                                <textarea class="input-xlarge" style="resize:none;" placeholder="Nombre" name="name" id="name" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix">
                                                <label for="image">Imagen</label>
                                                <input name="image" id="image" type="file" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    <button type="submit" id="button_save" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--End Modal edit warehouse/product-->