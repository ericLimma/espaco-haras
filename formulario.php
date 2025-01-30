<!DOCTYPE html>
<html lang="pt-br">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Espaço Haras | Formulário</title>

        <?php include './assets/php/fav_icon.php' ?>

        <!-- Css -->
        <link rel="stylesheet" href="./assets/css/commom-style.css">
        <link rel="stylesheet" href="./assets/css/formulario.css">

</head>

<body>
        <?php include './assets/php/header.php' ?>
        <main>
                <form id="eventoForm" method="post" class="formulario">
                        <img class="form-img" src="assets/img/capa.webp" alt="">
                        <div class="form-container">
                                <div>
                                        <h2>Organize seu Evento Aqui</h2>
                                        <p>Cada evento e cliente é único, e acreditamos que nossos serviços também devem ser.</p>
                                </div>
                                <div class="fieldset-container">
                                        <fieldset class="fieldset">
                                                <legend>Dados Pessoais</legend>
                                                <label for="nome">Nome: </label>
                                                <input class="form-input" type="text" id="nome" name="nome" placeholder="Digite seu Nome"
                                                        required autofocus />
                                                <label for="email">E-mail: </label>
                                                <input class="form-input" autocomplete="email" type="email" name="email" id="email"
                                                        placeholder="ex.: meuemail@exemplo.com" required />
                                                <label for="tel">Telefone: </label>
                                                <input class="form-input" autocomplete="tel" type="tel" id="tel" name="tel"
                                                        placeholder="(00) 0 0000 - 0000 " required />

                                        </fieldset>
                                        <fieldset class="fieldset">
                                                <legend>Dados do Evento </legend>
                                                <label for="eventos">Tipo de evento: </label>
                                                <select class="form-input" id="eventos" name="eventos">
                                                        <option selected disabled value="selecione" class="transparent_option">Selecione
                                                        </option>
                                                        <option value="casamento">Casamento</option>
                                                        <option value="aniversario">Aniversário</option>
                                                        <option value="corporativo">Corporativo</option>
                                                        <option value="outros">Outros</option>
                                                </select>
                                                <label for="data">Data do Evento:</label>
                                                <input class="form-input data" type="datetime-local" id="data" name="data"
                                                        placeholder="01/01/2024 - 00:00" />
                                                <label for="convidados">Número de Convidados: </label>
                                                <input class="form-input" type="number" name="convidados" id="convidados" placeholder="0">
                                        </fieldset>
                                </div>
                                <fieldset class="fieldset">
                                        <div class="radio-container">
                                                <p>Prefiro ser contatado via:</p>
                                                <div class="radio-group">
                                                        <label for="whatsapp">
                                                                <input type="radio" class="radio-custom" id="whatsapp" name="contato"
                                                                        value="via-whatsapp" checked />
                                                                <span class="custom-radio"></span>
                                                                whatsapp
                                                        </label>
                                                        <label for="contato-email">
                                                                <input type="radio" id="contato-email" name="contato" value="via-email" />
                                                                <span class="custom-radio"></span>
                                                                e-mail
                                                        </label>
                                                </div>
                                        </div>
                                        <label for="mensagem">Sua mensagem: </label>
                                        <textarea class="form-input textarea" name="mensagem" id="mensagem" cols="30" rows="5"
                                                placeholder="Deixe sua mensagem ..."></textarea>
                                        <button type="submit" class="button btn-vermelho" data-button>
                                                Enviar
                                                <div class="btn-icon"></div>
                                        </button>
                                </fieldset>
                        </div>

                </form>
        </main>

        <?php include './assets/php/footer.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
        <script defer src="./assets/js/aos_init.js"></script>

</body>

</html>