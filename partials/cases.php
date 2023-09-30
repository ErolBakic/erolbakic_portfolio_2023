<div class="cases" id="cases">
    <div class="cases__content container">

    <?php $cases = get_post( get_field('cases_page', 'options') ) ?>
        
        <div class="col-1">
            <div class="cases__text">
                <h3 class="title">
                    <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-6.svg') ?>
                    <span><?= $cases->post_title ?></span>
                </h3>
            </div>
        </div>

        <div class="col-2">
            <nav class="cases__text cases__text--icons">
                <ul class="slider-nav">
                    <li>
                        <button class="slider-nav__btn">
                            <img src="http://erolbakic.dk/wp-content/uploads/2023/09/Image-2.svg" alt="aaa">
                        </button>
                    </li>
                    <li>
                        <button class="slider-nav__btn">
                            <img src="http://erolbakic.dk/wp-content/uploads/2023/09/Image-2.svg" alt="aaa">
                        </button>
                    </li>
                    <li>
                        <button class="slider-nav__btn">
                            <img src="http://erolbakic.dk/wp-content/uploads/2023/09/Image-2.svg" alt="aaa">
                        </button>
                    </li>
                    <li>
                        <button class="slider-nav__btn active">
                            <img src="http://erolbakic.dk/wp-content/uploads/2023/09/Image-2.svg" alt="aaa">
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

    <div class="cases__example container">
        <div class="case" style="background-image: url('http://erolbakic.dk/wp-content/uploads/2023/09/Image-1-scaled.jpg')">
            <h3 class="title title--white">Test</h3>

            <ul class="technologies">
                <li class="technologies__item"><img class="technologies__img" src="http://erolbakic.dk/wp-content/uploads/2023/09/Path-9.svg" alt="a"></li>
            </ul>

            <div class="description">
                <div class="description__content col-1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra ipsum et pulvinar faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus rutrum nibh nibh, et ornare dui consectetur eget. Mauris ac pretium nunc. Proin vitae quam mi. Integer ornare aliquet augue pharetra dignissim. Maecenas ut turpis in ex placerat consequat.</p>
                </div>
            </div>

            <div class="btn">
                <a href="#" class="btn__link">
                    <span class="btn__gfx">
                        <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-13.svg') ?>
                    </span>
                    Gå til side
                </a>
            </div>

        </div>
    </div>
</div>