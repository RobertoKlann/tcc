jQuery.noConflict();
$.noConflict();

$('button[name=incluir]').click(function() {
    $.get('/ViewInicial/getProximoCodigoSubCategoria', function(dados){
        $('input[name=codigo]').val(dados[0].maxcodigo + 1);
    });

    $.get('/ViewInicial/getAllCategorias', function(dados){
        $('select').html('<option value="">Selecione</option>');
        for (i = 0; i < dados.length; i++) {
            $('select').append($('<option>', {
                value: dados[i].ctgcodigo,
                text: dados[i].ctgdescricao
            }));
        }        
    });
});

$(document).ready(function(){
    $('a[href="#sign_up"]').click(function() {
        var iCodigo = $('a[href="#sign_up"]').prevObject[0].activeElement.attributes[5].value;

        $.get('/ViewInicial/getSubCategoria/' + iCodigo, function(dados){
            $('input[name=codigo]').val(dados[0].sbccodigo);
            $('input[name=descricao]').val(dados[0].sbcdescricao);

            $('select').append($('<option>', {
                value: dados[0].ctgcodigo,
                text: dados[0].ctgdescricao
            }));
        });
    }); 
});