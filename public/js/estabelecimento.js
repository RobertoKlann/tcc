jQuery.noConflict();
$.noConflict();

$('button[name=incluir]').click(function() {
    $.get('/ViewInicial/getProximoCodigoEstabelecimento', function(dados){
        $('input[name=codigo]').val(dados[0].maxcodigo + 1);
    });

    $.get('/ViewInicial/getAllCategoriasEst', function(dados){
        $('select').html('<option value="">Selecione</option>');
        for(i = 0; i < dados.length; i++) {            
            $('select').append($('<option>', {
                value: dados[i].ctecodigo,
                text: dados[i].ctedescricao
            }));
        }        
    });
});

$(document).ready(function(){
    $('a[href="#sign_up"]').click(function() {
        var iCodigo = $('a[href="#sign_up"]').prevObject[0].activeElement.attributes[5].value;

        $.get('/ViewInicial/getEstabelecimento/' + iCodigo, function(dados){
            $('input[name=codigo]').val(dados[0].estcodigo);
            $('input[name=nomerazao]').val(dados[0].estnomerazao);
            $('input[name=endereco]').val(dados[0].estendereco);
            $('input[name=horario]').val(dados[0].esthorario);

            $('select').append($('<option>', {
                value: dados[0].ctecodigo,
                text: dados[0].ctedescricao
            }));
        });
    }); 
});