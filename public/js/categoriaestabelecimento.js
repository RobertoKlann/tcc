$(document).ready(function(){
    if($('#form-incluir-cat-est')[0]) {
        $.get('/bobWaiter/getProximoCodigo', function(dados){
            $('input[name=codigo]').val(dados[0].maxcodigo + 1);
        });
    }
    
    $('a[name=excluirCatEst]').click(function() {
        let iCodigo       = $(this)[0].attributes.value.value,
            laravel_token = $("#token").val();
            
        $.ajax({
            url: 'http://127.0.0.1:8000/bobWaiter/estabelecimento/categoria/destroy/' + iCodigo,
            type: 'delete',
            dataType: 'JSON',
            headers: {
                'X-CSRF-Token': laravel_token
            },
            success: function (data) {
                if(data.succes != 'true') {
                    swal("Não foi possível excluir a categoria, pois ela está vinculada a um estabelecimento!", "", "warning");
                } else {
                    swal("Categoria excluida com sucesso!", "", "success");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/bobWaiter/estabelecimento/categoria';
                    },2000);
                }
            }
        }); 
    });
});