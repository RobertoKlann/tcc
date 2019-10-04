$(document).ready(function(){
    
    if($('#form-incluir-est')[0]) {
        $.get('/bobWaiter/getProximoCodigoEstabelecimento', function(dados){
            $('input[name=codigo]').val(dados[0].maxcodigo + 1);
        });
        
        $.get('/bobWaiter/getAllCategoriasEst', function(dados){
            $('select').html('<option value="">Selecione</option>');
            for(i = 0; i < dados.length; i++) {            
                $('select').append($('<option>', {
                    value: dados[i].ctecodigo,
                    text: dados[i].ctedescricao
                }));
            }        
        });
    }
    
    if($('#form-alterar-est')[0] && $('input[name=codigo]')) {
        $.get('/bobWaiter/getAllCategoriasEst', function(dados){
            let bSelected = false,
                categoria = $('input[id=categoria-est]').val();
            
            $('select').html('<option value="">Selecione</option>');
            for(i = 0; i < dados.length; i++) {
                if(dados[i].ctecodigo == categoria) {
                    bSelected = true;
                } else {
                    bSelected = false;
                }
                
                $('select').append($('<option>', {
                    value: dados[i].ctecodigo,
                    text: dados[i].ctedescricao,
                    selected: bSelected
                }));
            }
        });
    }
    
    $('a[name=excluirEstabelecimento]').click(function() {
        let iCodigo       = $(this)[0].attributes.value.value,
            laravel_token = $("#token").val();
            
        $.ajax({
            url: 'http://127.0.0.1:8000/bobWaiter/estabelecimento/destroy/' + iCodigo,
            type: 'delete',
            dataType: 'JSON',
            headers: {
                'X-CSRF-Token': laravel_token
            },
            success: function (data) {
                if(data.success != 'true') {
                    swal("Não foi possível excluir o estabelecimento!", "", "warning");
                } else {
                    swal("Estabelecimento excluido com sucesso!", "", "success");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/bobWaiter/estabelecimento';
                    },2000);
                }
            }
        }); 
    });
});