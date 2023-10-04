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

        <?php $caseList = get_field('cases_list', 'options') ?>

        <?php if(count($caseList) > 0): ?>
        <div class="col-2">
            <nav class="cases__text cases__text--icons">
                <ul id="target-cases" data-action="<?= site_url('/wp-json/cases/fetch-case') ?>" class="slider-nav">
                    <?php foreach($caseList as $itr => $case): ?>
                        <li>
                            <button data-goto="<?= $case ?>" class="slider-nav__btn <?= $itr == 0 ? 'active' : '' ?>" style="background-color:<?= get_field('nav_color', $case) ?>">
                                <img src="<?= get_field('nav_icon', $case) ?>" alt="<?= get_the_title($case) ?>">
                            </button>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
        <?php endif ?>

    </div>

    <?php if(count($caseList) > 0): ?>

        <?php 
            $featured = $caseList[0];
            $type = pathinfo( get_field('cover', $featured), PATHINFO_EXTENSION);
            $type = in_array($type, ['webm', 'mp4']) ? 'video' : 'image';
        ?>

        <div class="cases__example container">
            <div id="target-case" class="case <?= $type == 'video' ? 'case--video' : '' ?>" style="background-image: url('<?= get_field('mobile_cover', $featured) ?>')">
                <h3 class="title title--white"><?= get_the_title($featured) ?></h3>

                <?php if(count( get_field('technologies', $featured) ) > 0): ?> 
                    <ul class="technologies">
                        <?php foreach(get_field('technologies', $featured) as $technology): ?>
                            <li class="technologies__item" title="<?= $technology['billede']['title'] ?>">
                                <?= file_get_contents( $technology['billede']['url'] ) ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>

                <div class="description">
                    <div class="description__content col-1">
                        <?= get_post_field('post_content', $featured) ?>
                    </div>
                </div>

                <div class="btn">
                    <?php if( get_field('externals', $featured) && count( get_field('externals', $featured) ) > 0): ?> 
                        <?php foreach(get_field('externals', $featured) as $link): ?>
                            <a target="_blank" href="<?= $link['goto']['url'] ?>" class="btn__link">
                                <span class="btn__gfx">
                                    <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-13.svg') ?>
                                </span>
                                <?= $link['goto']['title'] ?>
                            </a>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>

                <?php if($type == 'video'): ?>
                    <video class="video" src="<?= get_field('cover', $featured) ?>" muted loop autoplay><video>
                <?php endif ?>

            </div>

            <div class="case loader">
                <svg class="loader__spinner" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38">
                    <defs>
                        <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                            <stop stop-color="#fff" stop-opacity="0" offset="0%"/>
                            <stop stop-color="#fff" stop-opacity=".631" offset="63.146%"/>
                            <stop stop-color="#fff" offset="100%"/>
                        </linearGradient>
                    </defs>
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(1 1)">
                            <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"/>
                            </path>
                            <circle fill="#fff" cx="36" cy="18" r="1">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"/>
                            </circle>
                        </g>
                    </g>
                </svg>
            </div>

        </div>
    <?php endif ?>
</div>