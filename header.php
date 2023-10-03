<header class="header">
    <div class="header__content container">
        
        <div class="col-1">
            <div class="header__profile">
                <h1 id="target-maintitle" class="header__title main-title">
                    <span class="firstname"><?= get_field('header_firstname', 'options') ?></span>
                    <span class="lastname"><?= get_field('header_lastname', 'options') ?></span>
                </h1>
                <figure class="profile" id="target-profile">
                    <img src="http://erolbakic.dk/wp-content/uploads/2023/09/figure.png" alt="Erol Bakic">
                </figure>
            </div>
        </div>

        <div class="col-2" id="target-header">
            <div class="header__nav">
                <nav class="nav" id="target-nav">

                    <?= wp_nav_menu([
                       'menu'      => 'primary_menu',
                       'container' => false
                    ]) ?>
                </nav>
            </div>

            <div class="header__text">
                <h2 class="sub-title"><?= get_field('header_title', 'options') ?></h2>

                <hr>

                <div class="eyecatcher">
                    <?= get_field('header_content', 'options') ?>
                </div>
            </div>
        </div>

    </div>
</header>
