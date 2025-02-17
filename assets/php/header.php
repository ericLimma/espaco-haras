<header class="header">
        <a class="logo" href="#">
                <img src="./assets/img-commom/logo_branco_2.webp" alt="Logo Espaço Haras">
        </a>
        <div class=" off-screen-menu">
                <ul class="nav-list">
                        <li><a href="#home">Home</a></li>
                        <li>
                                <div class="nav-accordion h-nav-accordion">
                                        <input type="checkbox" id="accordion-h-nav">
                                        <label class="accordion-label" for="accordion-h-nav">
                                                Tipo de Evento
                                                <span class="arrow nav-arrow">
                                                        <img src="./assets/icons/down-gray.webp" alt=""></span>
                                        </label>
                                        <div class="nav-accordion-content">
                                                <ul class="nav-accordion-list">
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-casamentos.php">Casamento</a></li>
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-corporativos.php">Corporativo</a></li>
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-formaturas.php">Formatura</a></li>
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-aniversarios.php">Aniversários e Outros</a></li>
                                                </ul>
                                        </div>
                                </div>
                        </li>

                        <?php
                        include('menu.php');

                        if ($title == 'principal') {
                                $menu = $menuPrincipal;
                        } else if ($title == 'casamento') {
                                $menu = $menuCasamento;
                        } else if ($title == 'corporativos') {
                                $menu = $menuCorporativo;
                        } else if ($title == 'formaturas') {
                                $menu = $menuFormaturas;
                        } else if ($title == 'aniversarios') {
                                $menu = $menuAniversarios;
                        }
                        echo $menu; ?>

                </ul>
        </div>
        <nav>
                <div class="ham-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                </div>
        </nav>
        <div class="horizontal-menu">
                <ul class="horizontal-menu-list">
                        <li><a href="#home">Home</a></li>
                        <li>
                                <div class="nav-accordion">
                                        <input type="checkbox" id="accordion-nav">
                                        <label for="accordion-nav">
                                                Tipo de Evento
                                                <span class="nav-arrow">
                                                        <img src="./assets/icons/down-gray.webp">
                                                </span>
                                        </label>
                                        <div class="nav-accordion-content">
                                                <ul class="nav-accordion-list">
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-casamentos.php">Casamento</a></li>
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-corporativos.php">Corporativo</a></li>
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-formaturas.php">Formatura</a></li>
                                                        <li><a target="_blank" href="https://espacoharas.com.br/lp-aniversarios.php">Aniversários e Outros</a></li>
                                                </ul>
                                        </div>
                                </div>
                        </li>
                        <?php echo $menu ?>
                </ul>
        </div>

</header>
<script defer src="./assets/js/arrow_animation.js"></script>
<script defer src="./assets/js/nav.js"></script>