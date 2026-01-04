<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

        body {
            background: linear-gradient(300deg, #b85e9d 0%, #82FDFF 90%);
            background-repeat: no-repeat;
            overflow: hidden;
            height: 100vh;
            background-position: 10%;
        }

        section {
            border-radius: 15px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            letter-spacing: -1.5px;
            margin: 0;
            margin-bottom: 15px;
        }
        h1 span {
            color:#b85e9d;
        }
    </style>
</head>
<body>
    <div class="container main">

        <section class="mt-5 mx-auto border bg-light col-11">
            <h1 class="text-center mb-2 mt-2">Página não <span>encontrada!</span> </h1>
            <div class="container d-flex justify-content-center">
                <img src="paginas/image/404_error.svg" alt="404 Error" class="w-75">
            </div>
        </section>
    </div>

    <script>
        const Url = window.location.href.split('/');
        const search = Url.find((element) => element == 'paginas');

        if (search != null) {

            var img = document.querySelector('img');
            img.src = 'image/404_error.svg';
        }
    </script>
</body>
</html>