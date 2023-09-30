<div class="main">
    <div class="main__content container">

        <?php $profile = get_post( get_field('profile_page', 'options') ) ?>

        <div class="col-1" >
            <main class="main__text" id="profil">
                <h3 class="title">
                    <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/path-16.svg') ?>
                    <span><?= $profile->post_title ?></span>
                </h3>
                
                <?= $profile->post_content ?>

                <div class="btn btn--center">
                    <a target="_blank" title="<?= get_field('profile_cv', 'options')['title'] ?>" href="<?= get_field('profile_cv', 'options')['url'] ?>" class="btn__link">
                        <span class="btn__gfx">
                            <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-12.svg') ?>
                        </span>
                        <?= get_field('profile_cv', 'options')['title'] ?>
                    </a>
                </div>
            </main>
        </div>

        <?php $skills = get_post( get_field('skills_page', 'options') ) ?>

        <div class="col-2">
            <div class="main__text main__text--small">
                <h3 class="title">
                    <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-11.svg') ?>
                    <span><?= $skills->post_title ?></span>
                </h3>
                <?= $skills->post_content ?>
            </div>
        </div>

    </div>
</div>