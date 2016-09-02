/*inicializacion de la funcion*/
$(function(){provider.init()});
/*declaracion de variables*/
var $form_validation_save=$("#save_form");
var $form_validation_update=$("#edit_form");

provider={
    /*inicializando funciones*/
    init:function(){
        provider.new_provider();
        provider.save();
        provider.edit();
        provider.update();
        provider.delete();
        provider.kardex();
        provider.table('/inventory/setting/provider/active','');
    },
    new_provider:function(){
        $('#new_item').on('click', function(event){
            $('#modal_form_save').modal('show');
            $('#nit').inputmask({ "mask": "9", "repeat": 14,'greedy' : false });
            $('#phone').inputmask({ "mask": "9", "repeat": 14,'greedy' : false });
        });
    },
    //guardar
    save:function(){
        //$form_validation_save.bootstrapValidator();
        $('#button_save').on('click', function(event) {
            provider.validate('store');      
        });
    },
    //recuperar datos para editar
    edit:function(){
        $('#edit_item').on('click', function(event) {
            var id = new Array();
            $("input:checkbox:checked").each(function(){
                if($(this).val()!='on' && $(this).val()!='true'){
                    id.push($(this).val());
                }
            });
            if(id.length>0){
                if(id.length<2){
                    var url     =   '/inventory/setting/provider/'+id+'/edit';
                    var method  =   'get';
                    var data    =   '';
                    var result = nextsofts.save(url,method,data); 
                    $('#modal_form_edit').modal({
                        backdrop: 'static',
                        show:true
                    });
                    $('#edit_nit').val(result.nit);
                    $('#edit_name').val(result.name);
                    $('#edit_phone').val(result.phone);
                    $('#edit_email').val(result.email);
                    $('#edit_country').val(result.country);
                    $('#edit_city').val(result.city); 
                    $('#edit_description').val(result.description); 
                    $('#edit_nit').inputmask({ "mask": "9", "repeat": 14,'greedy' : false });
                    $('#edit_phone').inputmask({ "mask": "9", "repeat": 14,'greedy' : false });
                    $form_validation_update.attr("action", '/provider/'+result.id);
                }else{
                    $.gritter.add({
                        title: 'Notificacion',
                        text: 'Seleccione un providere para editar',
                        image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-error'
                    });
                }
            }else{
                $.gritter.add({
                    title: 'Notificacion',
                    text: 'Seleccione un providere para editar',
                    image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                    sticky: false,
                    time: '',
                    class_name: 'gritter-error'
                });
            }    
        });
    },
    //enviar datos para actualzar
    update:function(){
        $('#button_update').on('click', function(event) {
            provider.validate('update');
            /*var url     =   $form_validation_update.attr('action')+'/'+$('#edit_provider_id').text();
            var method  =   $form_validation_update.attr('method');
            var data    =   $form_validation_update.serialize();
            var result = nextsofts.save(url,method,data); 
            if(result.type="success"){
                $('#table_list').DataTable().ajax.reload();
                $('#modal_form_edit').modal('hide');
                $.gritter.add({
                    title: 'Notificacion',
                    text: result.message,
                    image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                    sticky: false,
                    time: '',
                    class_name: 'gritter-success'
                });
            } */ 
        });
    },
    //eliminar
    delete:function(){
        $('#delete_item').on('click', function(event) {
            var id = new Array();
            $("input:checkbox:checked").each(function(){
                if($(this).val()!='on' && $(this).val()!='true'){
                    id.push($(this).val());
                }
            });
            if(id.length>0){
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var provider = id.toString();
                        var array = {id:provider}; 
                        
                        var url = '/inventory/setting/provider/all';
                        var method = 'delete';
                        var data = $.param(array);
                        var result = nextsofts.save(url,method,data); 
                        if(result.type="success"){
                            $('#table_list').DataTable().ajax.reload();
                            $.gritter.add({
                                title: 'Notificacion',
                                text: result.message,
                                image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                                sticky: false,
                                time: '',
                                class_name: 'gritter-success'
                            });
                        }  
                    }else{
                        $.gritter.add({
                            title: 'Notificacion',
                            text: 'Cancelado por el usuario',
                            image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                            sticky: false,
                            time: '',
                            class_name: 'gritter-error'
                        });
                    }
                });
            }else{
                $.gritter.add({
                    title: 'Notificacion',
                    text: 'Porfavor selecione un providere.',
                    image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                    sticky: false,
                    time: '',
                    class_name: 'gritter-error'
                });
            }    
        });
    },
    //tabla
    table:function(url, dataValue){
        var colums=[
            { "data": null, orderable: false,
                render: function(data,type,row){
                    return '<label class="pos-rel"> <input type="checkbox" value="'+row.id+'" id="check_id_'+row.id+'" class="ace" /> <span class="lbl"></span> </label>';
                }
            },
            { "data": 'nit'},
            { "data": "name"},
            { "data": "phone"},
            { "data": "email"},
            { "data": "country"},
            { "data": "city"},
            { "data": 'description'},
            { "data": 'deleted_at',
                render: function(data,type,row){
                    if(data == null){
                        var html = '<center><span style="display:none;">'+data+'</span><i class="fa fa-check green"></i></center>';
                    }else{
                        var html = '<center><span style="display:none;">'+data+'</span><i class="fa fa-ban red"></i></center>';
                    }
                    return html;
                }
            }
        ];
        var select = [[10,25,50,100],[10,25,50,100]];
        var nomTabla = ('#table_list');
        var url = url;
        var order= [[ 1, "asc" ]];
        var check = 1;
        nextsofts.table(nomTabla, url, colums, order, check, select, dataValue);  
    },
    //muestra el kardex del providere
    kardex:function(url){
        $('#kardex_provider').on('click', function(e) {
            var id = new Array();
            $("input:checkbox:checked").each(function(){
                if($(this).val()!='on' && $(this).val()!='true'){
                    id.push($(this).val());
                    provider_id = $(this).val();
                    
                }
            });
            if(id.length>0){
                if(id.length<2){
                    window.location.href='/inventory/setting/provider/'+provider_id+'/kardex';
                }else{
                    $.gritter.add({
                        title: 'Notificacion',
                        text: 'Seleccione un providere para editar',
                        image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-error'
                    });
                }
            }else{
                $.gritter.add({
                    title: 'Notificacion',
                    text: 'Seleccione un providere para editar',
                    image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                    sticky: false,
                    time: '',
                    class_name: 'gritter-error'
                });
            }
            
        });
    },
    validate:function(type){
        if(type=='store'){
            $form = $form_validation_save;
        }else{
            $form = $form_validation_update;
        }
        $form.validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: true,
            ignore: "",
            rules: {
                abr: {required: true },
                name: {required: true }
            },
            messages: {
                abr: {required: "Ingrese una valor."},
                name: {required: "Ingrese una valor."}
            },
            highlight: function (e) {
                $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            },
            success: function (e) {
                $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                $(e).remove();
            },
            errorPlacement: function (error, element) {
                if(element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                }
                else if(element.is('.chosen-select')) {
                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                }else error.insertAfter(element.parent());
            },
            submitHandler: function (form) {
                var url     =   $form.attr('action');
                var method  =   $form.attr('method');
                var data    =   $form.serialize();
                var result = nextsofts.save(url,method,data);
                $.gritter.add({
                    title: 'Notificación',
                    text: result.message,
                    image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                    sticky: false,
                    time: '',
                    class_name: 'gritter-'+result.type
                }); 
                if(result.type=="success"){
                    $('#table_list').DataTable().ajax.reload();
                    if(type=='store'){
                        nextsofts.clear();
                    }else{
                        $('#modal_form_edit').modal('hide');
                    }
                }
            },
            invalidHandler: function (form) {
                $.gritter.add({
                    title: 'Notificación',
                    text: 'Verifique los datos porfavor',
                    image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                    sticky: false,
                    time: '',
                    class_name: 'gritter-error'
                });
            }
        });    
    }
};