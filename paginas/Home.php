
<?php 

session_start();

if (empty($url)) {
  header("location: ../");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- FAV-ICON -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon_.ico">
  <link rel="apple-touch-icon" href="paginas/image/favicon/apple-touch-icon.png">

  <link rel="stylesheet" href="paginas/styles/Home.css">
  <title>Spiral - Página Principal </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
    integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

    <!-- GOOGLE ICONS -->
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,
    100..700,0..1,-50..200" />
</head>
<body>

  <div class="effect">
      <div class="response">
      </div>
    </div>

  <header>

    <div class="mid container text-center align-items-center mt-5">
      <h1 class="display-4 pt-5">Seja Bem-Vindo ao <span>Spiral</span></h1>
      <h3 class="display-6 mb-2 text-center text-secondary w-100" id='cliente-nome'></h3>

      <hr class="container w-25">

      <p class="py-2 mx-auto">
        Se você está procurando saber mais sobre TDAH,
        e seus possíveis sintomas está no lugar certo
      </p>
      <div class="row ml-auto">
        <button class="col-3 btn btn-primary" id="btn-cadastro" type="submit">Começe agora</button>
        <button class="col-3 btn btn-primary" id="btn-diario" type="submit">Crie seu próprio diário </button>
      </div>
      <img class="img-fluid my-5" src="paginas/image/Psychologist.gif" title=".">
      <h1 class="text2 pt-5">Fique atualizado com pessoas da mídia!</h1>
      <!-- <p class="mx-auto w-75 py-2">Our landing page template works on all devices, so you only have to set is up
        once, and get beautiful results forever</p> -->
    </div>

  </header>

  <section class="features my-5 w-100">
    <div class="row py-5 justify-content-center w-100">
      <div class="one text-center align-items-center col-lg-5 mx-3 bg-light mb-5 border border-light rounded pt-1">
        <img class="img-fluid" src="paginas/image/cabeca2.png" width="16%" title=".">
        <h3 class="pt-3">An ADHD Success Story</h3>
        <p align = "justify">Jessica McCabe nos conta a história de sua vida. Outrora uma criança superdotada com um futuro brilhante, que
          mais tarde vive uma vida de fracassos constantes,
          porque uma coisa - seu diagnóstico de TDAH.</p>
        <h5>Link: <a href="https://youtu.be/JiwZQNYlGQI?si=kj0qldcZJw-o-jDm">TEDx Talks</a></h5>
      </div>
      <div class="one text-center align-items-center col-lg-5 mx-3 bg-light mb-5 border border-light rounded pt-1">
        <img class="img-fluid" src="paginas/image/cabeca2.png" width="16%" title=".">
        <h3 class="pt-3">TDAH | Palestra</h3>
        <p align = "justify">Haroldo nos mostra através de uma emocionante e bem humorada palestra, um pouco da sua trajetória e como
          utilizou o TDAH (Transtorno do Déficit de Atenção com
          Hiperatividade) na sua vida e se torna palestrante de TEDx!</p>
        <h5>Link: <a href="https://www.youtube.com/watch?v=ekyIkGxoDt4">TEDx Talks</a></h5>
      </div>
      <div class="one text-center align-items-center col-lg-5 mx-3 bg-light mb-5 border border-light rounded pt-1">
        <img class="img-fluid" src="paginas/image/cabeca2.png" width="16%" title=".">
        <h3 class="pt-3">ABDA | TDAH</h3>
        <p align = "justify">Vídeo com depoimentos de pessoas com TDAH, seus familiares e profissionais de saúde e educação. Sendo um
          vídeo que cita a vida de pessoas com TDAH com suas tendências,
          explicando como é a sua vida, que os rodeia e mais! Confira agora nesta live como funciona as pessoas que possuem TDAH!</p>
        <h5>Link: <a href="https://www.youtube.com/watch?v=XfAp8_706OU">Depoimento</a></h5>
      </div>
      <div class="one text-center align-items-center col-lg-5 mx-3 bg-light mb-5 border border-light rounded pt-1">
        <img class="img-fluid" src="paginas/image/cabeca2.png" width="16%" title=".">
        <h3 class="pt-3">TDAH: Live</h3>
        <p align = "justify">O Transtorno do Déficit de Atenção e Hiperatividade - TDAH é uma condição que ocorre muito em crianças e que
          pode acarretar uma série de prejuízos em seu desenvolvimento,
          o que exige um diagnóstico apropriado e uma intervenção adequada e é este o tema desta live com o Dr. Paulo
          Liberalesso.</p>
        <h5>Link: <a href="https://www.youtube.com/watch?v=aqA0uGNbIy4">Luna ABA</a></h5>
      </div>
      <div class="one text-center align-items-center col-lg-5 mx-3 bg-light mb-5 border border-light rounded pt-1">
        <img class="img-fluid" src="paginas/image/cabeca2.png" width="16%" title=".">
        <h3 class="pt-3">Sintomas | Vida na adulta</h3>
        <p align = "justify">Entre os sinais mais frequentes do TDAH em adultos estão: atrasos frequentes em compromissos de trabalho,
          falta de organização, oscilação abrupta de humor, dificuldade de
          se expressar, repetição de palavras com frequência, Instabilidade emocional, comportamentos que afetam a vida
          profissional, acadêmica e as relações interpessoais</p>
        <h5>Link: <a href="https://www.youtube.com/watch?v=NaFPFFzFs8c">Vida adulta</a></h5>
      </div>
      <div class="one text-center align-items-center col-lg-5 mx-3 bg-light mb-5 border border-light rounded pt-1">
        <img class="img-fluid" src="paginas/image/cabeca2.png" width="16%" title=".">
        <h3 class="pt-3">Podcast | TDAH</h3>
        <p align = "justify">Os pacientes diagnosticados sofrem um grande impacto nas atividades diárias. Para muitas pessoas pode parecer
          ser algo simples, como exemplo, prestar atenção em uma
          conversa e organizar as tarefas ao longo da semana, para um paciente com TDAH essas são tarefas muito
          complexas. Os pacientes têm muita dificuldade em prestar atenção</p>
        <h5>Link: <a href="https://www.youtube.com/watch?v=R-TuZrvu-nI">TDAH</a></h5>
      </div>

    </div>
  </section>
  <hr class="container mx-auto" id="about">

  <section class="about container my-5">
    <h1 class="text2 pt-5 text-center">Sobre o TDAH e como funciona?</h1>
    <p class="mx-auto w-75 py-2 text-center">Aviso! Este website não possui a função de identificar ou diagnosticar as
      pessoas,
      apenas ajudar com informações!</p>

    <div class="row align-items-center my-5 item-about-hidden">
      <div class="content col-lg-6 col-md-6 col-12 p-4">
        <h6>A PRESENÇA DO TDAH</h6>
        <h2>Sintomas comuns presentes </h2>
        <p align = "justify">Lembrando sempre que as informações contidas neste website não devem ser usadas como um substituto para o
          cuidado
          médico e orientação médico especialista. Pode haver variações no tratamento que o especialista pode recomendar
          com base em fatos e circunstâncias individuais.</p>
      </div>
      <div class="img col-lg-6 col-md-6 col-12 p-4">
        <img class="img-fluid w-100" src="paginas/image/sintomaTdah.png" title=".">
      </div>
    </div>

    <div class="row align-items-center my-5 item-about-hidden-v2">
      <div class="img col-lg-6 col-md-6 col-12 p-4">
        <img class="img-fluid w-100" src="paginas/image/cérebrotdah.jpg" title=".">
      </div>
      <div class="content col-lg-6 col-md-6 col-12 p-4">
        <h6>CÉREBRO DO TDAH</h6>
        <h2>Como é no cérebro?</h2>
        <p align = "justify">O TDAH é um transtorno neurobiológico de concepção genética, concernente a disfunção na região pré-frontal do
          cérebro que é encarregado de controlar os impulsos, a inibir comportamentos, a gerenciar a atenção e memória
          como
          também a capacidade de planejar e organizar.</p>
      </div>

    </div>

    <div class="row align-items-center my-5 item-about-hidden">
      <div class="content col-lg-6 col-md-6 col-12 p-4">
        <h6>O TDAH NA INFÂNCIA E ADOLESCÊNCIA</h6>
        <h2>Como ajudar e conduzir!</h2>
        <p align = "justify">Para ajudar e guiar alunos (crianças e adolescentes) e adultos com TDAH, é importante estabelecer rotinas
          claras e estruturadas, fornecer instruções breves e diretas, usar reforços positivos, quebra de tarefas em
          etapas
          menores, e considerar a medicação quando apropriado, sob a orientação de um profissional de saúde. A terapia
          comportamental e o apoio da família também desempenham um papel fundamental no gerenciamento do TDAH.</p>
      </div>
      <div class="img col-lg-6 col-md-6 col-12 p-4">
        <img class="img-fluid w-100" src="paginas/image/dicaTdah.jpg" title=".">
      </div>
    </div>

  </section>
  <hr class="container mx-auto" id="feedback">

  <section class="feedback container my-5">
    <h1 class="text2 pt-5 text-center">Melhor compreensão para a diferença dos demais!</h1>
    <p class="mx-auto py-2 w-75  text-center">"A educação é a arma mais poderosa que você pode usar para mudar o mundo."
      - Nelson Mandela. A educação adequada e o suporte são essenciais para ajudar pessoas com TDAH a alcançar seu pleno
      potencial.</p>
    <div class="row justify-content-center align-items-center mt-5">
      <div class="col-lg-4 col-md-6 col-12 m-3 frases">
        <span class="material-symbols-outlined">
          psychology
        </span>
        <p>"A diversidade é o que faz a vida ser interessante, e o valor de uma mente brilhante não deve ser
          subestimado."</p>
        <hr class="mx-auto my-4">
        <h4>Julian M. Seifter / <span>Professor Harvard Medical School</span></h4>
      </div>
      <div class="col-lg-4 col-md-6 col-12 m-3 frases">
        <span class="material-symbols-outlined">
          psychology
        </span>
        <p>"A diferença não é um defeito."</p>
        <hr class="mx-auto my-4">
        <h4>Jean-Jacques Rousseau / <span> Filósofo, teórico político, escritor e compositor genebrino.</span></h4>
      </div>
      <div class="col-lg-4 col-md-6 col-12 m-3 frases">
        <span class="material-symbols-outlined">
          psychology
        </span>
        <p>"Educar a mente sem educar o coração não é educação de forma alguma."</p>
        <hr class="mx-auto my-4">
        <h4>Aristóteles / <span>Filósofo e polímata da Grécia Antiga</span></h4>
      </div>
    </div>

  </section>

  <hr class="container mx-auto" id="footer">

  <section class="footer my-5">
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block text-center w-100">
          <span class="display-6">Sobre nós: </span>
        </div>
        <!-- Left -->

      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="SocialMidia">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-4 col-lg-5 col-xl-4 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3 text-secondary"></i>SPIRAL Ltda
              </h6>
              <p align = "justify">
              A SPYRAL Ltda é uma empresa fictícia dedicada à inovação no campo da saúde mental, com um foco especial no Transtorno de Déficit de Atenção e Hiperatividade (TDAH). Fundada com a missão de proporcionar recursos informativos e apoio prático para aqueles afetados pelo TDAH.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Artigos
              </h6>
              <p>
                <a href="https://www.scielo.br/j/pusp/a/8yKwZ7nLBCxr7h5TffqPvKz/">
                  Avaliação diagnóstica TDAH
                </a>
              </p>
              <p>
                <a href="https://www.scielo.br/j/pe/a/dMWSQRntTwZwHpXBTswQHhv ">
                  TDAH: entre as funções, disfunções e otimização da atenção 
                </a>
              </p>
              <p>
                <a href="https://www.scielo.br/j/pcp/a/K7H6cvLr349XXPXWsmsWJQq/ ">
                  História oficial do TDAH
                </a>
              </p>
              <p>
                <a href="https://www.scielo.br/j/cp/a/RM8nGJcvFs35R68vKyMnVtf/?lang=pt&format=html ">
                  TDAH e a pscologia histórica-cultural
                </a>
              </p>
              <p>
                <a href="https://periodicorease.pro.br/rease/article/view/9696/3786 ">
                  Importância da relação de professor, e alunos com TDAH
                </a>
              </p>
              <p>
                <a href="https://downloads.editoracientifica.com.br/books/978-65-5360-280-9.pdf#page=97 ">
                  TDAH na adultez emergente
                </a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4"> -->
              <!-- Links -->
              <!-- <h6 class="text-uppercase fw-bold mb-4">
                Useful links
              </h6>
              <p>
                <a href="#!" class="text-reset">Pricing</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Settings</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Orders</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Help</a>
              </p> -->
            <!-- </div> -->
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
              <p class="d-flex">
                <span class="material-symbols-outlined">location_on</span>
                Ourinhos - SP
              </p>
              <p class="d-flex">
              <span class="material-symbols-outlined">alternate_email</span>
                info@exemplo.com
              </p>
              <p class="d-flex">
                <span class="material-symbols-outlined">phone</span> 
                + 11 9945-6788
              </p>
              <p class="d-flex">
                <span class="material-symbols-outlined">smartphone</span> 
                + 12 99451-6789
              </p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

    </footer>
    <!-- Footer -->
  </section>

  <script src="paginas/scripts/jquery/jquery-3.5.1.min.js"></script>
  <script src="paginas/scripts/Home.js"></script>
</body>
</html>
