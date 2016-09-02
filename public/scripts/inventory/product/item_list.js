item_list={
    //tabla
    table:function(){
        var colums=[
            { "data": "sku"},
            { "data": "code"},
            { "data": 'name'}
        ];
        var select = [[5,10,25,50,100],[5,10,25,50,100]];
        var nomTabla = ('#table_list_order');
        var url = '/warehouse/product/active';
        var order= [[ 0, "asc" ]];
        var check = 1;
        nextsofts.table(nomTabla, url, colums, order, check, select, '');  
    }
};