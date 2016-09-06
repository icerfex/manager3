<!--Modal crate client-->
<div class="modal modal-primary fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_form_save">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false;" action="{{URL::to('/inventory/setting/client')}}" id="save_form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Datos del nuevo Cliente</h4>
                </div>
                <div class="modal-body">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="save_nit">NIT/CI</label>
                                    <input id="save_nit" type="text" class="form-control" name="nit" placeholder="NIT/CI" required />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="save_name">Nombre</label>
                                    <input id="save_name" type="text" class="form-control" name="name" placeholder="Nombre" required />
                                </div>  
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="save_phone">Teléfono</label>
                                    <input id="save_phone" type="phone" class="form-control" name="phone" placeholder="Teléfono" />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="save_email">Email</label>
                                    <input id="save_email" type="email" class="form-control" name="email" placeholder="Email" />
                                </div>  
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="save_direction">Dirección</label>
                                    <input id="save_direction" type="text" class="form-control" name="direction" placeholder="Dirección" />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="save_location">Zona</label>
                                    <input id="save_location" type="text" class="form-control" name="location" placeholder="Zona" />
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="save_whatsapp">Whatsapp</label>
                                    <label>
                                        <input id="save_whatsapp" name="whatsapp" class="ace ace-switch" type="checkbox" />
                                        <span class="lbl" data-lbl="SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO"></span>
                                    </label>
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
<!--End Modal crate client-->