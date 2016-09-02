<!--Modal edit client-->
<div class="modal modal-primary fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_form_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false;" action="" id="edit_form" method="put" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Editar datos del Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_nit">NIT/CI</label>
                                    <input id="edit_nit" type="text" class="form-control" name="nit" placeholder="NIT/CI" required />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_name">Nombre</label>
                                    <input id="edit_name" type="text" class="form-control" name="name" placeholder="Nombre" required />
                                </div>  
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_phone">Teléfono</label>
                                    <input id="edit_phone" type="phone" class="form-control" name="phone" placeholder="Teléfono" />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_email">Email</label>
                                    <input id="edit_email" type="email" class="form-control" name="email" placeholder="Email" />
                                </div>  
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_direction">Dirección</label>
                                    <input id="edit_direction" type="text" class="form-control" name="direction" placeholder="Dirección" />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_location">Zona</label>
                                    <input id="edit_location" type="text" class="form-control" name="location" placeholder="Zona" />
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="edit_whatsapp">Whatsapp</label>
                                    <label>
                                        <input id="edit_whatsapp" name="whatsapp" class="ace ace-switch" type="checkbox" />
                                        <span class="lbl" data-lbl="SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO"></span>
                                    </label>
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
<!--End Modal edit client-->