jQuery.noConflict();
$.noConflict();

$('button[name=incluir]').click(function() {
    $.get('/ViewInicial/getProximoCodigoMesa', function(dados){
        $('input[name=codigo]').val(dados[0].maxcodigo + 1);
    });
});

$(document).ready(function(){
    $('a[href="#sign_up"]').click(function() {
        var iCodigo = $('a[href="#sign_up"]').prevObject[0].activeElement.attributes[5].value;

        $.get('/ViewInicial/getMesa/' + iCodigo, function(dados){
            $('input[name=codigo]').val(dados[0].msacodigo);
            $('input[name=qtdlugares]').val(dados[0].msaqtdlugares);
            $('input[name=situacao]').val(dados[0].msasituacao);
        });
    }); 
});