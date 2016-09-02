<!--Modal edit warehouse/subcategory-->
<div class="modal modal-primary fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_form_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false;" action="" id="edit_form" method="put">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Cod: <span name="code" id="edit_code"></span> - Editado Categoria</h4>
                </div>
                <input type="text" readonly name="code" id="edit_input_code" hidden="true" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_abr">Abr</label>
                                    <input type="text" id="edit_abr" name="abr" class="form-control" placeholder="Abr" required />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_name">Nombre</label>
                                    <input type="text" id="edit_name" name="name" class="form-control" placeholder="Nombre" required />
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
<!--End Modal edit warehouse/subcategory-->