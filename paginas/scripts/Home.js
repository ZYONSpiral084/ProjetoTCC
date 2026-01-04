
$(document).ready(() => {

    $.ajax({
        type: "GET",
        url: "servicos/ClienteGet.php",
        success: (response) => {

            const resp = JSON.parse(response);

            if (resp.error == 0) {

                $('#cliente-nome').html(resp.data[0].nome);
            }
            else if (resp.error == 2) {
                console.log('Erro: ' + resp.error);
            }
        }
    });

    // $('#navbar').load('./nav_bar.html');

    $('#btn-cadastro').click(() => {
        window.location.href = 'Login_Cadastro';
    });
    
    $('#btn-diario').click(() => {
        window.location.href = 'Diario';
    });
})

const observer = new IntersectionObserver(entries => {
    // console.log(entries)
    if (entries[0].intersectionRatio >= 0.1) {
        entries[0].target.classList.add('item-about-hidden-off');
    }
   
}, {
    threshold: [0, 0.1, 0.4, 1]
})

const arr = [];
arr.push(document.querySelector('.item-about-hidden-v2'));
arr.push($('.item-about-hidden')[0]);
arr.push($('.item-about-hidden')[1]);

arr.forEach(element => {
    observer.observe(element);
})


// EXIBIR MENSAGEM
function exibirMensagem (mensagem, erro) {

    const cor = (erro == 1) ? "red" : "#333";

    $(".effect").addClass("on");

    $(".effect.on .response").html(`
        <h3>Mensagem</h3>
        <p class="response-message" style='padding: 2px;color: ${cor};'>${mensagem}</p>
    `);

    setTimeout(() => {
        $(".effect .response").html("");
        $(".effect.on").removeClass("on");
    }, 2000);        
}
