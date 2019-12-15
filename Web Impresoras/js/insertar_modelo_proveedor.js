function getFormData( $form ){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function( n, i ){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

$(document).ready(function() {
    $('#formularioinsertarproducto').submit(function(event) {
        event.preventDefault();
        var $form = $("#formularioinsertarproducto");
        var data_producto = getFormData($form);
        $.ajax({
            url: 'http://192.168.0.179:8000/tipocartucho/', // action
            type: 'post',        // method
            dataType: 'json',
            data: data_producto
        })
        .done(function(){ // true
            console.log("SUCCESS");
        })
        .fail(function(){ // false
            console.log("FAIL");
        })
        .always(function(){
            console.log(data_producto);
        });
    });
});


$(document).ready(function() {
    $('#formularioinsertarproveedor').submit(function(event) {
        event.preventDefault();
        var $form = $("#formularioinsertarproveedor");
        var data_proveedor = getFormData($form);
        $.ajax({
            url: 'http://192.168.0.179:8000/tipocartucho/', // action
            type: 'post',        // method
            dataType: 'json',
            data: data_proveedor
        })
        .done(function(){ // true
            console.log("SUCCESS");
        })
        .fail(function(){ // false
            console.log("FAIL");
        })
        .always(function(){
            console.log(data_proveedor);
        });
    });
});
