/**Métodos JS globais da aplicação
 * @author Roberto Klann
 * @author William Goebel
 * @since 2019/09/19
 */

$(document).ready(function () {

    $(document).on("click", "tr td", function () {
        trataAcoesConsulta();
    });

    function trataAcoesConsulta() {
        let aSelecionados = $('.selected');

        if (aSelecionados.length > 1) {
            trataAcaoAlterar(false);
            trataAcaoVisualizar(false);
            trataAcaoExcluir(true);
        } else if (aSelecionados.length == 1) {
            trataAcaoAlterar(true);
            trataAcaoVisualizar(true);
            trataAcaoExcluir(true);
        } else {
            trataAcaoAlterar(false);
            trataAcaoVisualizar(false);
            trataAcaoExcluir(false);
        }
    }

    function trataAcaoAlterar(bHabilita) {
        let oBotao = $('#alterar');
        if (bHabilita) {
            oBotao.removeClass('disabled');
        } else {
            oBotao.addClass('disabled');
        }
    }

    function trataAcaoExcluir(bHabilita) {
        let oBotao = $('#excluir');

        if (bHabilita) {
            oBotao.removeClass('disabled');
        } else {
            oBotao.addClass('disabled');
        }
    }

    function trataAcaoVisualizar(bHabilita) {
        let oBotao = $('#visualizar');

        if (bHabilita) {
            oBotao.removeClass('disabled');
        } else {
            oBotao.addClass('disabled');
        }
    }

    function selecionados() {
        let aSelecionados = Array.from($('.selected'));
        let ids = [];
        //Arrow function
        aSelecionados.forEach(item => ids.push(item.id));
        //Define o objeto
        let idObj = {"ids": ids};
        //Converte pra JSON
        myJSON = JSON.stringify(idObj);
        //codificação para base 64
        return btoa(myJSON);
    }

    $('#excluir').click(function () {
        $('#modalExcluir').show();
    });

    $('.close').click(function () {
        $('#modalExcluir').hide();
    });

    $('#nao').click(function () {
        $('#modalExcluir').hide();
    });

    $(window).click(function (e) {
        if (e.target == $('#modalExcluir')[0]) {
            $('#modalExcluir').hide();
        }
    });

});

/**
 * Permite apenas caracteres númericos.
 */
function onlynumber(evt) {
    let theEvent = evt || window.event,
        key      = theEvent.keyCode || theEvent.which;

    key = String.fromCharCode(key);
    let regex = /^[0-9.]+$/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault)
            theEvent.preventDefault();
    }
}