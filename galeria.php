<?php
// Define o diretório onde as fotos estão armazenada
$title = 'principal';
$diretorio = './assets/img/carousel/';
$arquivos = scandir($diretorio);
$extensoes_permitidas = ['jpg', 'jpeg', 'png', 'webp'];
$imagens = array_values(array_filter($arquivos, function ($arquivo) use ($extensoes_permitidas) {
        return in_array(strtolower(pathinfo($arquivo, PATHINFO_EXTENSION)), $extensoes_permitidas);
}));

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
                content="Espaço de eventos ideal para casamentos e muito mais. Oferecemos um ambiente elegante e versátil para tornar seu evento inesquecível.">
        <meta name="keywords"
                content="espaço para eventos, casamentos, aniversários, eventos corporativos, aluguel de espaço, eventos especiais, decoração de eventos, buffet, salão de festas">
        <meta name="author" content="Espaço Haras">
        <meta property="og:title" content="Espaço de Eventos para Casamentos, Aniversários e Mais | Espaço Haras">
        <meta property="og:description"
                content="Encontre o espaço perfeito para seu evento. Oferecemos soluções para casamentos com uma decoração sofisticada e serviços personalizados.">
        <meta property="og:image" content="assets/img/capa.webp">
        <meta property="og:url" content="https://https://espacoharas.com.br/galeria">
        <meta property="og:type" content="website">


        <title>Espaço Haras | Galeria</title>

        <?php include './assets/php/fav_icon.php' ?>

        <!-- Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Css -->
        <link rel="stylesheet" href="./assets/css/commom-style.css">
</head>

<body>
        <?php include 'assets/php/header.php' ?>
        <main>
                <h1 class="display-3 text-uppercase text-center" data-aos="fade-up">
                        Galeria de Fotos
                        <div class="detalhe-div"></div>
                </h1>
                <style>
                        main {
                                padding: 2rem 0;

                        }

                        main h1 {
                                font-family: "Abhaya Libre", serif;
                                font-weight: 400;
                                text-align: center;
                        }


                        .mosaic {
                                column-count: 2;
                                /* Número de colunas */
                                column-gap: .5rem;
                                /* Espaço entre colunas */
                                gap: 15px;
                                /* Espaço entre as imagens */


                                width: 100vw;
                                /* Garante que o contêiner ocupe toda a largura */
                                overflow: hidden;
                                padding: 2rem;
                        }

                        .mosaic img {
                                width: 100%;
                                /* Ocupa 100% da largura da coluna */
                                height: auto;
                                /* Mantém a proporção da imagem */
                                margin-bottom: 1rem;
                                /* Espaço entre as imagens */
                                object-fit: cover;
                                /* Cobrir o espaço sem distorcer */
                                display: block;
                                /* Remove espaços extras abaixo das imagens */
                                border-radius: 4px;
                                break-inside: avoid;
                                /* Evita que as imagens sejam cortadas entre colunas */
                                transition: transform .3s ease-in-out;
                        }

                        .mosaic img:hover {
                                transform: scale(1.05);
                        }

                        @media screen and (min-width: 900px) {
                                .mosaic {
                                        column-count: 4;

                                }
                        }
                </style>

                <div class="mosaic">
                        <?php
                        foreach ($imagens as $imagem) {
                                echo "<img src='{$diretorio}{$imagem}' alt='Imagem'>";
                        }
                        ?>
                </div>
                <?php include 'assets/php/footer.php' ?>

                <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js">
                </script>
                <script defer src="./assets/js/aos_init.js"></script>
</body>

</html>