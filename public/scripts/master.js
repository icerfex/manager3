var nextsofts={
    save:function(url,method,data){
        var result='';
        $.ajax({
            url: url,
            type: method,
            data: data,
            headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') }, 
            dataType: 'json',
            async: false,
            error: function(respuesta) {
                alert('Error del servidor');
            },
            success: function(respuesta){
                result=respuesta;
            }
        });
        return result;
    },
    table:function(name_table, url, columns, order, check, select, data){
        var otable = $(name_table).DataTable({
            "destroy": true,
            "sCookiePrefix": "DataTable",
            "iCookieDuration": 60*60*24,
            //responsive:true,
            "ajax": {
                "url": url,
                "data": data,
                "dataSrc": "",
                "dataType": 'json',
                "type": "GET"
            },
            "columns": columns,
            'aLengthMenu':select,
            "order": order,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sZeroRecords": "No existen datos para esta consulta",
                "sInfo": "_START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "0 Registros, ",
                "sInfoFiltered": "(De un maximo de _MAX_ registros)",
                "sSearch": "_INPUT_",
                "sEmptyTable": "No hay datos disponibles para esta tabla",
                "sLoadingRecords": "Por favor espere - Cargando...",
                "sProcessing": "Cargando...",
                "sSortAscending": " - click/Volver a ordenar en orden Ascendente",
                "sSortDescending": " - click/Volver a ordenar en orden descendente",
                "oPaginate": {
                    "sNext":     ">",
                    "sPrevious": "<",
                    "sFirst": "<<",
                    "sLast": ">>"
                }
            }
        });
        if(check==1){
        //    nextsofts.tools(otable, name_table);
        }
    },
    tools:function(otable, name_table){
        //initiate TableTools extension
        var tableTools_obj = new $.fn.dataTable.TableTools(otable, {
            "sRowSelector": "td:not(:last-child)",
            "sRowSelect": "multi",
            "fnRowSelected": function(row) {
                //check checkbox when row is selected
                try { $(row).find('input[type=checkbox]').get(0).checked = true }
                catch(e) {}
            },
            "fnRowDeselected": function(row) {
                //uncheck checkbox
                try { $(row).find('input[type=checkbox]').get(0).checked = false }
                catch(e) {}
            },
            "sSelectedClass": "success",
        } );

        /////////////////////////////////
        //table checkboxes
        //$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        //select/deselect all rows according to table header checkbox
        $(name_table+' > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) tableTools_obj.fnSelect(row);
                else tableTools_obj.fnDeselect(row);
            });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $($(name_table)).on('click', 'td input[type=checkbox]' , function(){
            var row = $(this).closest('tr').get(0);
            if(!this.checked) tableTools_obj.fnSelect(row);
            else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
        });
    },
    upload:function(url,image){
        var file_data = $("#"+image).prop("files")[0];   
        var data = new FormData();                  
        data.append("file", file_data)
        var result='';
        $.ajax({
            url: url,
            type: 'POST',
            headers: { 'X-CSRF-TOKEN' : $('meta[name=_token]').attr('content') },
            data:data,
            contentType:false, //Debe estar en false para que pase el objeto sin procesar
            processData:false, //Debe estar en false para que JQuery no procese los datos a enviar,
            cache:false, //Para que el formulario no guarde cache
            async: false,
            error:function(){
                alert('error');
            },
            success: function(respuesta) {
                result=respuesta;
            }
        });
        return result;
    },
    clear:function(){
      $(".clear").val('');
      return false;
    },
    
    alert_grear_remove:function(){
        $.gritter.removeAll();
        return false;
    }
}