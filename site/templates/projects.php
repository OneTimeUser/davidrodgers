<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This template lists all all the subpages of the `phototography` page with title and cover image.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>
    <?php snippet('header') ?>
    <a class="back" href="<?= $site->url() ?>#client-list"></a>

    <nav id="menu" class="menu">
        <div class="address">
            <!--<p>DAVID RODGERS INC</p>-->
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

    <div class="main__content">

        <?php 
$albums = page('projects')->children()->listed()->flip();
if($tag = urldecode(param('tag'))){
    $albums = $albums->filterBy('tags', $tag, ',');
}
//    echo "<script>console.log('" . json_encode($albums) . "');</script>";s
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



        <?php snippet('footer') ?>
