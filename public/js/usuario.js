$(document).ready(function(){
    
    if($('#form-incluir-usuario')[0]) {
        $.get('/bobWaiter/getProximoCodigoUsuario', function(dados){
            $('input[name=codigo]').val(dados[0].maxcodigo + 1);
        });
    }
    
    $('a[name=excluirUsuario]').click(function() {
        let iCodigo       = $(this)[0].attributes.value.value,
            laravel_token = $("#token").val();
            
        $.ajax({
            url: 'http://127.0.0.1:8000/bobWaiter/usuario/destroy/' + iCodigo,
            type: 'delete',
            dataType: 'JSON',
            headers: {
                'X-CSRF-Token': laravel_token
            },
            success: function (data) {
                if(data.success != 'true') {
                    swal("Não foi possível excluir o usuário!", "", "warning");
                } else {
                    swal("Usuário excluido com sucesso!", "", "success");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/bobWaiter/usuario';
                    },2000);
                }
            }
        }); 
    });
    
    $('.mascaracpf').mask('000.000.000-00', {reverse: true});
    $('.mascaradata').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.mascaratelefone').mask("(00) 0 0000-0000");
});