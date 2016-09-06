<!--Modal crate warehouse/subcategory-->
<div class="modal modal-primary fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_form_save">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false;" action="{{URL::to('/inventory/setting/subcategory')}}" id="save_form" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Registrar Nueva Categoria</h4>
                </div>
                <div class="modal-body">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="abr">Abr</label>
                                    <input type="text" id="abr" name="abr" class="form-control clear" placeholder="Abr" required />
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="clearfix">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control clear" placeholder="Nombre" required />
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
<!--End Modal crate warehouse/subcategory-->