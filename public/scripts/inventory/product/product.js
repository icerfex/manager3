/*inicializacion de la funcion*/
$(function(){product.init()});
/*declaracion de variables*/
var $form_validation_save=$("#save_form");
var $form_validation_update=$("#edit_form");

product={
    /*inicializando funciones*/
    init:function(){
        product.new_product();
        product.save();
        product.edit();
        product.update();
        product.delete();
        product.kardex();
        product.table('/inventory/product/active','');
        product.open_list();
    },
    open_list:function(){
        $('.button_list').on('click', function(event){
            $('#modal_table_list').modal('show');
            product_list.table();
        }); 
    },
    new_product:function(){
        $('#new_product').on('click', function(event){
            $('#modal_product_save').modal('show');
            $('.select2_save').select2({dropdownParent: $('#modal_product_save'), width: '95%' });
            $('#order_product').inputmask({ "mask": "9", "repeat": 6,'greedy' : false });
        });
    },
    //guardar
    save:function(){
        $('#button_save').on('click', function(event) {
            /* Act on the event */
            product.validate('store');
        });
    },
    //recuperar datos para editar
    edit:function(){
        $('#edit_product').on('click', function(event) {
            var id = new Array();
            $("input:checkbox:checked").each(function(){
                if($(this).val()!='on' && $(this).val()!='true'){
                    id.push($(this).val());
                }
            });
            if(id.length>0){
                if(id.length<2){
                    var url     =   '/inventory/product/'+id+'/edit';
                    var method  =   'get';
                    var data    =   '';
                    var result = nextsofts.save(url,method,data); 
                    $('#modal_form_edit').modal({
                        backdrop: 'static',
                        show:true
                    });
                    $('#edit_category_id').val(result.category_id).change();
                    $('#edit_subcategory_id').val(result.subcategory_id).change();
                    $('#edit_unit_id').val(result.unit_id).change();
                    $('#edit_order_product').val(result.order_product);
                    $('#edit_name').val(result.name);
                    $('.select2_edit').select2({dropdownParent: $('#modal_form_edit'), width: '95%' });
                    $('#edit_order_product').inputmask({ "mask": "9", "repeat": 6,'greedy' : false });
                    $form_validation_update.attr("action", '/inventory/product/'+result.id);
                }else{
                    $.gritter.add({
                        title: 'Notificacion',
                        text: 'Seleccione un product para editar',
                        image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-error'
                    });
                }
            }else{
                $.gritter.add({
                    title: 'Notificacion',
                    text: 'Seleccione un product para editar',
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
            product.validate('update');
        });
    },
    //eliminar
    delete:function(){
        $('#delete_product').on('click', function(event) {
            var id = new Array();
            $("input:checkbox:checked").each(function(){
                if($(this).val()!='on' && $(this).val()!='true'){
                    id.push($(this).val());
                }
            });
            if(id.length>0){
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var product = id.toString();
                        var array = {id:product}; 
                        
                        var url = '/inventory/product/all';
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
                            text: 'Cancelado por el usuario.',
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
                    text: 'Porfavor selecione un producte.',
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
                    return '<label class="pos-rel"><input type="checkbox" value="'+row.id+'" id="check_id_'+row.id+'" class="ace" /><span class="lbl"></span></label>';
                }
            },
            { "data": null,
                render: function(data,type,row){
                    return '<img height="50" width="70" src="'+row.photo+'" /><span style="display:none">'+row.sku+'</span>';
                }
            },
            { "data": null,
                render: function(data,type,row){
                    var html = row.code+'<br>'+row.sku;
                    return html;
                }
            },
            { "data": 'category.name',
                render: function(data,type,row){
                    var html = 'Categoria: '+row.category.name+'<br>Subcategoria: '+row.subcategory.name;
                    return html;
                }
            },
            { "data": "unit.name"},
            { "data": "name"},
            { "data": 'deleted_at',
                render: function(data,type,row){
                    if(data == null){
                        var html = '<center><span style="display:none;">'+data+'</span><i class="fa fa-check green"></i></center>';
                    }else{
                        var html = '<center><span style="display:none;">'+data+'</span><i class="fa fa-ban red"></i></center>';
                    }
                    return html;
                }
            },
            { "data": null, orderable: false,
                render: function(data,type,row){
                    var timeC = row.created_at.split(" ");
                    var dateC = timeC[0].split("-");
                    var newDateC = dateC[2]+'-'+dateC[1]+'-'+dateC[0];

                    var timeM = row.updated_at.split(" ");
                    var dateM = timeM[0].split("-");
                    var newDateM = dateM[2]+'-'+dateM[1]+'-'+dateM[0];
                    return 'Creación: '+newDateC+' <br>Modificación: '+newDateM;
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
    //muestra el kardex del producte
    kardex:function(url){
        $('#kardex_product').on('click', function(e) {
            var id = new Array();
            $("input:checkbox:checked").each(function(){
                if($(this).val()!='on' && $(this).val()!='true'){
                    id.push($(this).val());
                    product_id = $(this).val();
                }
            });
            if(id.length>0){
                if(id.length<2){
                    window.location.href='/inventory/product/'+product_id+'/kardex';
                }else{
                    $.gritter.add({
                        title: 'Notificacion',
                        text: 'Seleccione un producte para editar',
                        image: 'http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png',
                        sticky: false,
                        time: '',
                        class_name: 'gritter-error'
                    });
                }
            }else{
                $.gritter.add({
                    title: 'Notificacion',
                    text: 'Seleccione un producte para editar',
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