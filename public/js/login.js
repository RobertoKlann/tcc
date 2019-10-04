$(document).ready(function(){
    $('#form-login').submit(function(e) {
        e.preventDefault();
        
        let dados = {
            "usulogin": $('input[name=login').val(),
            "ususenha": $('input[name=password]').val(),
            "usccodigo": "1"
        };
        validaLogin(dados);
    });
});

function validaLogin(dados) {
    axios({
        method : 'post',
        url    : 'http://192.168.0.103/api/bobwaiter/v1/auth/login',
        data   : dados
    })
    .then(response => {
        if(!response.data) {
            alert(response.message);
            return;
        }

        localStorage.setItem('token', response.data.token);
        window.location.href = 'http://bobwaiter.com/web/home';
    });
}