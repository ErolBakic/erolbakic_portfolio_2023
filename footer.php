<footer class="footer" id="contact">
    <div class="footer__content container">

        <?php $footer = get_post( get_field('contact_page', 'options') ) ?>

        <div class="col-1">
            <div class="footer__text">
                <h3 class="title">
                    <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-5.svg') ?>
                    <span><?= $footer->post_title ?></span>
                </h3>

                <?= $footer->post_content ?>
            </div>
        </div>

        <div class="col-2">
            <div class="footer__text">

                <?php if(have_rows('contact_list', 'options')): ?>
                    <ul class="contacts">
                        <?php while( have_rows('contact_list', 'options') ): the_row() ?>

                            <li class="contacts__item">
                                <a target="_blank" href="<?= get_sub_field('prefix') . str_replace(' ', '', get_sub_field('value') ) ?>">
                                    <?= file_get_contents( get_sub_field('icon') ) ?>
                                    <span>
                                        <span class="small-title"><?= get_sub_field('title') ?></span>
                                        <?= get_sub_field('value') ?>
                                    </span>
                                </a>
                            </li>

                        <?php endwhile ?>
                    </ul>
                <?php endif ?>

            </div>
        </div>

    </div>

    <div class="cridentials">
        <p>erolbakic.dk © Erol Bakic 2017 - <?= date('Y') ?> All Rights Reserved</p>
    </div>

    <?= wp_footer(); ?>
</footer>