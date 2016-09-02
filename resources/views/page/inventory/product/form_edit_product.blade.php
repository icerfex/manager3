<!--Modal edit warehouse/product-->
<div class="modal modal-primary fade" id="modal_form_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false;" action="" id="edit_form" method="put" >
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        Editar Producto
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
                                                <label for="edit_category_id">Selecione Categoria</label>
                                                <select id="edit_category_id" data-md-selectize class="form-control select2_edit" name="category_id" data-placeholder="Selecione Categoria" required>
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
                                                <label for="edit_subcategory_id">Seleccione Subcategoria</label>
                                                <select id="edit_subcategory_id" class="form-control select2_edit" name="subcategory_id" data-placeholder="Seleccione Subcategoria" required>
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
                                                <label for="edit_unit_id">Seleccione Unidad</label>
                                                <select class="form-control select2_edit" id="edit_unit_id" name="unit_id" data-placeholder="Seleccione Unidad" required>
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
                                                <label for="edit_order_product">Nro. Orden</label>
                                                <div class="input-group">
                                                    <input type="phone" class="form-control" id="edit_order_product" name="order_product" placeholder="Nro. Orden" required />
                                                    <span class="input-group-btn">
                                                        <a href="#modal_table_list" class="btn btn-sm btn-default" data-toggle="modal" type="button">
                                                            <i class="ace-icon fa fa-list bigger-110"></i>
                                                            Lista
                                                        </a>
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
                                                <label for="edit_name">Nombre</label>
                                                <textarea id="edit_name" class="input-xlarge" style="resize:none;" placeholder="Nombre" name="name" required></textarea>
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
                                                <input name="image" id="edit_image" type="file" >
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
                    <button type="submit" id="button_update" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--End Modal edit warehouse/product-->