<!--Modal crate provider-->
<div class="modal modal-primary fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_form_save">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false;" action="{{URL::to('/provider')}}" id="save_form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Datos del nuevo Cliente</h4>
                </div>
                <div class="modal-body">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="nit">NIT/CI</label>
                                    <input type="text" id="nit" class="form-control" name="nit" placeholder="NIT/CI" required />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Nombre" required />
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="phone">Teléfono</label>
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Teléfono" />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" />
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="country">Pais</label>
                                    <input type="text" name="country" class="form-control" name="country" placeholder="Dirección" required />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="city">Ciudad/Direccion</label>
                                    <input type="text" name="city" class="form-control" name="city" placeholder="Zona" required />
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="description">Descripción</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Descripción"></textarea>
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
<!--End Modal crate provider-->