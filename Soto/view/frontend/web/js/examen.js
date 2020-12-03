define(['jquery'], function($) {
    return function(config,element) {
        $(element).on('click','.btn-nota-alta',function(){
            alert("La nota mas alta es: "+config.config);
        });
        $(element).on('click','.btn-ocultar',function(){
            $(element).find('.nota').hide();
            $(element).find('.btn-ocultar').hide();
            $(element).find('.btn-mostrar').show();
        });
        $(element).on('click','.btn-mostrar',function(){
            $(element).find('.nota').show();
            $(element).find('.btn-ocultar').show();
            $(element).find('.btn-mostrar').hide();

        });

    }
});