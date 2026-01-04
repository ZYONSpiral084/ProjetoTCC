
if (url == '' || url == 'Home') {
    $('.item-home').addClass('active');
}
else if (url == 'Diario') {
    $('.item-diario').addClass('active');
}

$('.item-home').click((e) => {

    e.preventDefault();

    if (url == 'Home') {
        $('html, body').scrollTop( $("header").offset().top - 100 );
    }
    else {
        window.location.href = 'Home';
    }
})

$('.item-sobre').click((e) => {

    e.preventDefault();

    if (url == 'Home') {
        $('html, body').scrollTop( $("#about").offset().top - 100 );
    }
    else {
        window.location.href = 'Home';
    }

})

$('.item-contato').click((e) => {

    e.preventDefault();

    if (url == 'Home') {
        $('html, body').scrollTop( $("#footer").offset().top );  
    }
    else {
        window.location.href = 'Home';
    }

})

$('#btn-entrar').click((e) => {
    e.preventDefault();
    window.location.href = 'Login_Cadastro';
})

$('#btn-sair').click((e) => {

    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'servicos/ClienteDeslogar.php',
        success: (response) => {
            const resp = JSON.parse(response);

            if (resp.error == 1) {

                exibirMensagem2(resp.message, resp.error, 1600);
            }
            else {

                exibirMensagem2(resp.message, resp.error, 1600);

                setTimeout(() => {
                    $('#cliente-nome').html('');
                    sessionStorage.setItem('esta_logado', 'false');
                }, 1700);
            }
        }
    })
})

function exibirMensagem22(message, erro, time) {

    const cor = (erro == 1) ? "red" : "#333";

    $(".effect").addClass("on");
    $('button').attr('disabled', true);
    $('a').css('pointer-events', 'none');

    $(".effect.on .response").html(`
        <h3>Mensagem</h3>
        <p class="response-message" style='color: ${ cor };'>${ message }</p>
    `);

    setTimeout(() => {
        $(".effect .response").html("");
        $(".effect.on").removeClass("on");
        $('button').attr('disabled', false);
        $('a').css('pointer-events', 'all');
    }, time);
}