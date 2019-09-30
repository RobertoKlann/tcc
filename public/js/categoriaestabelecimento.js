jQuery.noConflict();
$.noConflict();

$('button[name=incluir]').click(function() {
    $.get('/ViewInicial/getProximoCodigo', function(dados){
        $('input[name=codigo]').val(dados[0].maxcodigo + 1);
    });
});

$(document).ready(function(){
    $('a[href="#sign_up"]').click(function() {
        var iCodigo = $('a[href="#sign_up"]').prevObject[0].activeElement.attributes[5].value;

        $.get('/ViewInicial/getCategoriaEstabelecimento/' + iCodigo, function(dados){
            $('input[name=codigo]').val(dados[0].ctecodigo);
            $('input[name=descricao]').val(dados[0].ctedescricao);
        });
    }); 
});