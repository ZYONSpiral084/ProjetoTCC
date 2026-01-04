

$(document).ready(() => {

    // Atualiza o campo Data para a data do dia
    atualizarData();

    // Verifica se o cliente está logado...
    if (sessionStorage.getItem("esta_logado") == 'true') {

        // Verifica se é a primeira vez que o usuário/cliente entra na página "Diário"
        if (localStorage.getItem("primeira_vez") == 'true') {

            exibirMensagem(
                "O formulário enviado pode ser enviado a um profissional da área, terapeuta e psicólogo" +
                "<br><span>Clique em qualquer lugar para fechar </span>",
                0,
                10000
            );
            // Depois de exibir a mensagem, a variavel passa a ser false...
            localStorage.setItem("primeira_vez", 'false');
        }

        // Envia o texto Diário ao Banco de Dados
        $("#btnEnviarDiario").click((e) => {

            e.preventDefault();

            const [titulo, data, texto] = [$("#titulo"), $("#data"), $("#texto")];

            if (!titulo.val() && !data.val() && !texto.val()) {
                exibirMensagem("Preencha os campos!", 1);
            }
            else {

                $.ajax({
                    type: "POST",
                    url: "servicos/DiarioAddTxt.php",
                    data: { titulo: titulo.val(), texto: texto.val(), data: data.val() },
                    success: (response) => {

                        const resp = JSON.parse(response);
                        console.log('reponse enviar: ' + resp);
                        // console.log(response);

                        if (resp.error <= 2) {
                            exibirMensagem(resp.message, resp.error, 2000);
                        }

                        titulo.val("");
                        texto.val("");
                    }
                }).fail((err) => console.log(err));
            }
        });
    } // Caso o Cliente não tenha concluido o login exibe uma mensagem, e o redireciona ao Login
    else {
        exibirMensagem("Volte depois de fazer o login!", 1, 2200);

        setTimeout(() => {
            window.location.href = "Login_Cadastro"
        }, 2200);
    }


});

// "Fecha" a Mensagem do php
$(".effect").click(() => {
    if ($(".effect").hasClass("on")) {

        $(".effect .response").html("");
        $(".effect").removeClass("on");
    }
});

// BAIXAR O DIARIO COMPLETO DO CLIENTE
$("#baixar_diario").click((e) => {

    e.preventDefault();

    $.ajax({
        type: "GET",
        url: "servicos/DiarioGetTxt.php",
        success: (response) => {

            console.log(response);
            const resp = JSON.parse(response);

            if (resp.error == 1) {
                exibirMensagem(resp.message, resp.error, 2000);
            }
            else if (resp.error == 0 && resp.data != null) {

                console.log('criando...');
                window.location.href = 'gerarPdf';
            }
        }
    }).fail((err) => {
        exibirMensagem("Ocorreu um erro, <br>tente novamente!", 1);
        console.log(err);
    });
})

// EXIBIR MENSAGEM
function exibirMensagem(mensagem, erro, temp = 2000) {

    const cor = (erro == 1) ? "red" : "#333";

    $(".effect").addClass("on");
    $('button').attr('disabled', true);
    $('a').css('pointer-events', 'none');

    $(".effect.on .response").html(`
        <h3>Mensagem</h3>
        <p class="response-message" style='color: ${ cor };'>${ mensagem }</p>
    `);

    setTimeout(() => {
        $(".effect .response").html("");
        $(".effect.on").removeClass("on");
        $('button').attr('disabled', false);
        $('a').css('pointer-events', 'all');
    }, temp);
}

// MUDAR CAMPO "data" PARA A DATA ATUAL
function atualizarData() {

    const data = new Date();
    const year = data.toLocaleString("default", { year: "numeric" });
    const month = data.toLocaleString("default", { month: "2-digit" });
    const day = data.toLocaleString("default", { day: "2-digit" });

    $("#data").val(`${year}-${month}-${day}`);
}