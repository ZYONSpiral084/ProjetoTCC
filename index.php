<?php

$url = isset($_GET['url']) ? explode('/', ucfirst($_GET['url'])) : ['Home'];

if (file_exists('paginas/' . $url[0] . '.php') || file_exists('servicos/' . $url[0] . '.php')) {

    if ($url[0] == 'Home' || $url[0] == 'Diario') {

        require('paginas/nav_bar.php');
    }

    if ($url[0] != 'GerarPdf') {
        require('paginas/' . $url[0] . '.php');
    }
    else {
        require('servicos/' . $url[0] . '.php');
    }
}
else {
    require('paginas/404.php');
}

?>


<script src="paginas/scripts/jquery/jquery-3.5.1.min.js"></script>
<script src="paginas/scripts/jquery/jquery.mask.min.js"></script>

<!-- Nav-Bar script -->
<script>
    const url = <?php echo json_encode($url[0]); ?>;
</script>
<script src="paginas/scripts/Navbar.js"></script>

