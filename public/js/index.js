urlCategoriaProduto = 'http://127.0.0.1:8000/bobWaiter/getAllCategoriasProduto/';

$(window).on('load', () => {
    $('#logout').on('click', onClickLogout);
    trataUrl();
});

function getCodigoUsuario() {
    let string = $('#spanusuario')[0].parentElement.textContent;

    return string.replace(/[^0-9]/g,'');
}

function trataUrl() {    
    $('#hrefcategoria')[0].href = $('#hrefcategoria')[0].href + '/' + getCodigoEstabelecimento();
    $('#hrefproduto')[0].href = $('#hrefproduto')[0].href + '/' + getCodigoEstabelecimento();
    $('#hrefmesa')[0].href = $('#hrefmesa')[0].href + '/' + getCodigoEstabelecimento();
    urlCategoriaProduto = urlCategoriaProduto + getCodigoEstabelecimento();
}

function getCodigoEstabelecimento() {
    return $('#codigoestabelecimento').val();
}