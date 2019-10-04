$('button[name=incluir]').click(function() {
    $.get('bobWaiter/getProximoCodigoMesa', function(dados){
        $('input[name=codigo]').val(dados[0].maxcodigo + 1);
    });
});

$(document).ready(function(){
    if($('#form-incluir-mesa')[0]) {
        $.get('/bobWaiter/getProximoCodigoMesa', function(dados){
            $('input[name=codigo]').val(dados[0].maxcodigo + 1);
        });
    }
    
    if($('#form-alterar-mesa')[0] && $('input[name=codigo]')) {        
        debugger;
        let situacao = $('input[name=situacao-alterar]').val();

        $('select[name=situacao]')[0].options[situacao].selected = false;
        
    }
    
    $('a[name=excluirMesa]').click(function() {
        let iCodigo       = $(this)[0].attributes.value.value,
            laravel_token = $("#token").val();
            
        $.ajax({
            url: 'http://127.0.0.1:8000/bobWaiter/mesa/destroy/' + iCodigo,
            type: 'delete',
            dataType: 'JSON',
            headers: {
                'X-CSRF-Token': laravel_token
            },
            success: function (data) {
                if(data.success != 'true') {
                    swal("Não foi possível excluir a mesa!", "", "warning");
                } else {
                    swal("Mesa excluida com sucesso!", "", "success");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/bobWaiter/mesa';
                    },2000);
                }
            }
        }); 
    });
});