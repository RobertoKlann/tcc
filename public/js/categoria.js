$(document).ready(function(){
    if($('#form-incluir-categoria')[0]) {
        $.get('/bobWaiter/getProximoCodigoCategoria', function(dados){
            $('input[name=codigo]').val(dados[0].maxcodigo + 1);
        });
    }
    
    $('a[name=excluirCategoria]').click(function() {
        let iCodigo       = $(this)[0].attributes.value.value,
            laravel_token = $("#token").val();
            
        $.ajax({
            url: 'http://127.0.0.1:8000/bobWaiter/categoria/destroy/' + iCodigo,
            type: 'delete',
            dataType: 'JSON',
            headers: {
                'X-CSRF-Token': laravel_token
            },
            success: function (data) {
                debugger;
                if(data.success !== 'true') {
                    swal("Não foi possível excluir a categoria!", "", "warning");
                } else {
                    swal("Categoria excluida com sucesso!", "", "success");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/bobWaiter/categoria';
                    },2000);
                }
            }
        }); 
    });
});