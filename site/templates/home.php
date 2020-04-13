<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`. 
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

    <?php snippet('header') ?>
    <!-- In this link we call `$site->url()` to create a link back to the homepage -->

    <a class="logo" href="<?= $site->url() ?>">D.R</a>
    <!--       <a class="back" href="<?= $site->url() ?>">BACK TO HOME PAGE</a>-->

    <nav id="menu" class="menu">
        <div class="address">
            <!--            <p>DAVID RODGERS INC</p>-->
            <p>
                <?= $site->address()->kirbytextinline() ?>
            </p>

        </div>
        <div class="contact">
            <p>T:
                <?= $site->phone()->kirbytextinline() ?>
            </p>
            <p><a href="mailto:<?= $site->email() ?>"><?= $site->email()->kt() ?></a></p>
        </div>

    </nav>
    </header>

    <svg height="0">
</svg>
    <div id="splash">
        <div class="panel middle">
            <p class="logo">D.R</p>
            <p>DAVID RODGERS INC</p>
        </div>
    </div>

    <div class="main__content home-page" id="home-page">

        <?php 
  // we always use an if-statement to check if a page exists to prevent errors 
  // in case the page was deleted or renamed before we call a method like `children()` in this case
     $albums = page('projects')->children()->listed()->filterBy("category", "featured", ",");

        ?>

        <section class="proj featured">
            <ul class="client" data-page="<?= $page->url() ?>">
                <?php foreach ($albums as $album): ?>
                <li class="client-name">

                    <div class="client-content">
                        <article>
                            <div class='project__container'>
                                <div class='project__text'>
                                    <h3 class="client__title">

                                        <?php foreach ($album->tags()->split() as $tags): ?>
                                        <span><?= $tags ?></span>
                                        <?php endforeach ?>
                                    </h3>

                                    <span class='project__headline'><?= $album->headline()->value() ?></span>
                                    <p class='project__sub'>
                                        <?= $album->subheading()->value() ?>
                                    </p>
                                    <p class='project__desc'>
                                        <?= $album->description()->value() ?>
                                    </p>
                                </div>
                                <div class='project__images main-carousel lazy'>
                                    <?php if ($album->video()->isNotEmpty()): ?>
                                    <div class='carousel-cell-image video-cell'>
                                        <?php $vidURL = "https://www.youtube.com/watch?v=" . $album->video()->value(); ?>

                                        <?= youtube($vidURL) ?>
                                            <!--
                                            <div class="video-cell__grippy"></div>
                                            <div class="video-cell__grippy"></div>
-->
                                    </div>
                                    <?php endif ?>


                                    <?php foreach($album->images() as $img): ?>
                                    <img class='carousel-cell-image' data-flickity-lazyload-srcset='
<?= $img->srcset([375, 800, 1024]) ?>' data-flickity-lazyload='<?= $img->url() ?>'>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </article>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </section>

        <section id="client-list" class="scroll-title">

            <span class="section__title">
                CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS <span> D.R </span> CLIENTS

            <!--
            <?php foreach ($site->clients()->toStructure()->shuffle() as $clientlogo): ?> 
             CLIENTS <img src='<?php echo $clientlogo->logos()->toFile()->url() ?> '>
            <?php endforeach ?>
-->
            </span>
            <article>
                <?php
                $tagsall = page('projects')->children()->listed()->pluck('tags', ',', true);
                
                count($tagsall)%2 !== 0 ? $numChunks = count($tagsall)/2 + .5 : $numChunks = count($tagsall)/2;
                                    
                                         
               echo "<script>console.log('" . json_encode($numChunks) . "');</script>"; 
                ?>



                    <ul class="client__archive">
                        <?php foreach($tagsall as $tag): ?>
                        <li class="client__title">
                            <a href="<?= url('projects', ['params' => ['tag' => urlencode($tag)]]) ?>">
                                <?= html($tag) ?>
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
            </article>

        </section>

        <section id="about-agency" class="scroll-title">
            <span class="section__title">ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT <span> D.R </span> ABOUT </span>
            <div class="about__dark-text">


                <?= $site->agency()->kt() ?>
            </div>

        </section>




        <?php snippet('footer') ?>
