<footer class="footer" id="contact">
    <div class="footer__content container">

        <div class="col-1">
            <div class="footer__text">
                <h3 class="title">
                    <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-5.svg') ?>
                    <span>Kontakt</span>
                </h3>

                <p>Du er velkommen til at kontakte mig hvis du har spørgsmål, eller bare gerne vil mødes over en kop kaffe, hvor vi i fællesskab udveksler erfaringer og får dækket mulighederne for et frugtbart samarbejde.</p>
                    <p>Det vil anbefales, at det bliver igennem e-mail eller LinkedIn, da jeg ikke altid står klar til at modtage opkald på visse tidspunkter.</p>
            </div>
        </div>

        <div class="col-2">
            <div class="footer__text">

                <ul class="contacts">
                    <li class="contacts__item">
                        <a href="#">
                            <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-17.svg') ?>
                            <span>
                                <span class="small-title">Telefon</span>
                                +45 60 60 89 94
                            </span>
                        </a>
                    </li>

                    <li class="contacts__item">
                        <a href="#">
                            <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-17.svg') ?>
                            <span>
                                <span class="small-title">Telefon</span>
                                +45 60 60 89 94
                            </span>
                        </a>
                    </li>

                    <li class="contacts__item">
                        <a href="#">
                            <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-17.svg') ?>
                            <span>
                                <span class="small-title">Telefon</span>
                                +45 60 60 89 94
                            </span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

    </div>

    <div class="cridentials">
        <p>erolbakic.dk © Erol Bakic 2017 - <?= date('Y') ?> All Rights Reserved</p>
    </div>

    <?= wp_footer(); ?>
</footer>