<footer id="footer" class="footer">
        <div class="footer-logo footer-item" data-aos="fade-up" data-aos-delay="110">
                <img class="footer-logo" src="./assets/img-commom/logo_branco_2.webp" alt="logo espaço haras branco">

                <p>A elegância e os encantos do nobre Espaço Haras são capazes de eternizar o seu evento ideal.</p>

                <p> O cenário traz toda a beleza da arquitetura rústica e impecável que torna o local único</p>

        </div>
        <div class="footer-row footer-item">
                <div class="footer-nav" data-aos="fade-up" data-aos-delay="150">
                        <h4>Nossos Serviços</h4>
                        <ul class="footer-nav-list">
                                <li><a href="#home">Home</a></li>
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
                <div class="contact-us footer-item" data-aos="fade-up" data-aos-delay="150">
                        <h4>Entre em contato</h4>
                        <a target="_blank" class="footer-contact whatsapp"
                                href="https://web.whatsapp.com/send?phone=5519997093745">
                                <img class="footer-icone" src="./assets/icons/whatsapp.webp" alt="icone whatsapp">
                                <p>+55 19 99709-3745 <br> <small>(Edmara - Gerente do Espaço Haras)</small></p>
                        </a>
                        <a target="_blank" class="footer-contact" href="https://maps.app.goo.gl/u3js43LNXedKpn5y6"
                                aria-label="nosso local">
                                <img class="footer-icone" src="./assets/icons/local-branco.webp" alt="icone localização">
                                <p>Rod. Dep. Laércio Côrte <br> <small>Km 136 - Piracicaba, Limeira - SP</small></p>
                        </a>
                        <a target="_blank" class="footer-contact" href="mailto:contato@espacoharas.com.br">
                                <img class="footer-icone" src="./assets/icons/email.webp" alt="icone email">
                                <p>contato@espacoharas.com.br</p>
                        </a>
                </div>
                <div class="follow-us footer-item" data-aos="fade-up" data-aos-delay="130">
                        <h4>Siga-nos</h4>
                        <a target="_blank" class="follow-us-link" href="https://www.instagram.com/espacoharaspiracicaba/">
                                <img class="footer-icone" src="./assets/icons/instagram.webp" alt="icone instagram">
                                <p>@espacoharaspiracicaba</p>
                        </a>
                        <a target="_blank" class="follow-us-link" href=" https://www.facebook.com/espacoharas/"><img
                                        class="footer-icone" src="./assets/icons/facebook.webp" alt="icone facebook">
                                <p>espacoharas</p>
                        </a>
                </div>
        </div>
</footer>
<div class="dev-contact">
        <p>Copyright © 2024 Espaço Haras. Todos os direitos reservados.</p>
        <div class="dev-info">
                <p>Desenvolvido por: <a href="#">Erick Lima</a></p>
                <div class="dev-medias">
                        <img src="./assets/icons/instagram.webp" alt="icone instagram">
                        <img src="./assets/icons/linkedin.webp" alt="icone linkedin">
                        <img src="./assets/icons/git.webp" alt="icone github">
                        <img src="./assets/icons/whatsapp.webp" alt="icone whatsapp">
                </div>
        </div>
</div>

<script src="./assets/js/whatsapp.js"></script>