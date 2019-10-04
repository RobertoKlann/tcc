$('button[name=incluir]').click(function() {   

    $.get('bobWaiter/getAllCategoriasProduto', function(dados){
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
        $.get('bobWaiter/getAllSubCategoriasProduto/' + iCodigoCategoria, function(dados){
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
    if($('#form-incluir-produto')[0]) {
        $.get('/bobWaiter/getProximoCodigoProduto', function(dados){
            $('input[name=codigo]').val(dados[0].maxcodigo + 1);
        });
        
        $.get('/bobWaiter/getAllCategoriasProduto', function(dados){
            $('select[name=catcodigo]').html('<option value="">Selecione</option>');
            for(i = 0; i < dados.length; i++) {            
                $('select[name=ctgcodigo]').append($('<option>', {
                    value: dados[i].ctgcodigo,
                    text: dados[i].ctgdescricao
                }));
            }        
        });
    }
    
    if($('#form-alterar-produto')[0] && $('input[name=codigo]')) {
        $.get('/bobWaiter/getAllCategoriasProduto', function(dados){
            let bSelected = false,
                categoria = $('input[id=categoria-produto]').val();
            
            $('select').html('<option value="">Selecione</option>');
            for(i = 0; i < dados.length; i++) {
                if(dados[i].ctgcodigo == categoria) {
                    bSelected = true;
                } else {
                    bSelected = false;
                }
                
                $('select').append($('<option>', {
                    value: dados[i].ctgcodigo,
                    text: dados[i].ctgdescricao,
                    selected: bSelected
                }));
            }
        });
    }
    
    $('a[name=excluirProduto]').click(function() {
        let iCodigo       = $(this)[0].attributes.value.value,
            laravel_token = $("#token").val();
            
        $.ajax({
            url: 'http://127.0.0.1:8000/bobWaiter/produto/destroy/' + iCodigo,
            type: 'delete',
            dataType: 'JSON',
            headers: {
                'X-CSRF-Token': laravel_token
            },
            success: function (data) {
                if(data.success !== 'true') {
                    swal("Não foi possível excluir o produto!", "", "warning");
                } else {
                    swal("Produto excluido com sucesso!", "", "success");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/bobWaiter/produto';
                    }, 2000);
                }
            }
        }); 
    });
});