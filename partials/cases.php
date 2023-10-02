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
                <ul class="slider-nav">
                    <?php foreach($caseList as $case): ?>
                        <li>
                            <button dat-goto="<?= $case ?>" class="slider-nav__btn active" style="background-color:<?= get_field('nav_color', $case) ?>">
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
            <div class="case <?= $type == 'video' ? 'case--video' : '' ?>" style="<?= $type == 'image' ? 'background-image: url(\'' . get_field('cover', $featured) . '\')' : '' ?>">
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
                        <?= get_the_content($featured) ?>
                    </div>
                </div>

                <?php if(count( get_field('externals', $featured) ) > 0): ?> 
                <div class="btn">
                    <?php foreach(get_field('externals', $featured) as $link): ?>
                        <a target="_blank" href="<?= $link['goto']['url'] ?>" class="btn__link">
                            <span class="btn__gfx">
                                <?= file_get_contents('http://erolbakic.dk/wp-content/uploads/2023/09/Path-13.svg') ?>
                            </span>
                            <?= $link['goto']['title'] ?>
                        </a>
                    <?php endforeach ?>
                </div>
                <?php endif ?>

                <?php if($type == 'video'): ?>
                    <video class="video" src="<?= get_field('cover', $featured) ?>" muted loop autoplay><video>
                <?php endif ?>

            </div>
        </div>
    <?php endif ?>
</div>