jQuery.noConflict();
$.noConflict();

$('button[name=incluir]').click(function() {
    $.get('/ViewInicial/getProximoCodigoProduto', function(dados){
        $('input[name=codigo]').val(dados[0].maxcodigo + 1);
    });

    $.get('/ViewInicial/getAllCategoriasProduto', function(dados){
        $('select[name=catcodigo]').html('<option value="">Selecione</option>');
        for(i = 0; i < dados.length; i++) {            
            $('select[name=catcodigo]').append($('<option>', {
                value: dados[i].ctgcodigo,
                text: dados[i].ctgdescricao
            }));
        }        
    });

    $('select[name=catcodigo]').change(function() {
        var iCodigoCategoria = $('select[name=catcodigo]').val();
        $.get('/ViewInicial/getAllSubCategoriasProduto/' + iCodigoCategoria, function(dados){
            $('select[name=subcatcodigo]').html('<option value="">Selecione</option>');            
            $('select[name=subcatcodigo]').removeAttr("disabled");

            for(i = 0; i < dados.length; i++) {            
                $('select[name=subcatcodigo]').append($('<option>', {
                    value: dados[i].sbccodigo,
                    text: dados[i].sbcdescricao
                }));
            }        
        });
    });  
});

$(document).ready(function(){
    $('a[href="#sign_up"]').click(function() {
        var iCodigo = $('a[href="#sign_up"]').prevObject[0].activeElement.attributes[5].value;

        $.get('/ViewInicial/getProduto/' + iCodigo, function(dados){
            $('input[name=codigo]').val(dados[0].prdcodigo);
            $('input[name=descricao]').val(dados[0].prddescricao);
            $('input[name=preco]').val(dados[0].prdpreco);

            $('select[name=subcatcodigo]').append($('<option>', {
                value: dados[0].sbccodigo,
                text: dados[0].sbcdescricao
            }));

            $('select[name=catcodigo]').append($('<option>', {
                value: dados[0].ctgcodigo,
                text: dados[0].ctgdescricao
            }));
        });
    });
});