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

    <nav id="menu" class="menu">
        <div class="address">
            <p>DAVID RODGERS INC.</p>
            <p>3016 Passmore drive</p>
            <p>LA, CA 90068</p>
        </div>
        <div class="contact">
            <p>T: 323 462 5310</p>
            <p>F: 323 462 5360</p>
            <p><a href="mailto:info@davidrodgersinc.com">info@davidrodgersinc.com</a></p>
        </div>

    </nav>
    </header>
    <svg height="0">
</svg>

    <div class="main__content home-page">

        <?php 
  // we always use an if-statement to check if a page exists to prevent errors 
  // in case the page was deleted or renamed before we call a method like `children()` in this case
     $album = page('projects')->children()->listed()->filterBy("category", "featured", ",")->shuffle()->first() ?>

        <section class="proj featured">
            <ul class="client" data-page="<?= $page->url() ?>">
                <?php foreach ($site->index()->listed()->filterBy("category", "featured", ",") as $album): ?>
                <li class="client-name">

                    <div class="client-content">
                        <article>
                            <div class='project__container'>
                                <div class='project__text'>
                                    <h3 class="client__title">

                                        <?= $album->title() ?>
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
                                    <?php foreach($album->images() as $img): ?>
                                    <img class='carousel-cell-image' data-flickity-lazyload='<?= $img->url() ?>'>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </article>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </section>

        <section class="proj archive">
            <h3 class="section__title">Archive</h3>

            <ul class="client" data-page="<?= $page->url() ?>">
                <?php foreach ($site->index()->listed()->filterBy("category", "archive", ",") as $album): ?>
                <li class="client-name">

                    <div class="client-content">
                        <article>
                            <div class='project__container'>
                                <div class='project__text'>
                                    <h3 class="client__title">

                                        <?= $album->title() ?>
                                    </h3>

                                    <span class='project__headline'><?= $album->headline()->value() ?></span>
                                    <p class='project__sub'>
                                        <?= $album->subheading()->value() ?>
                                    </p>
                                    <p class='project__desc'>
                                        <?= $album->description()->value() ?>
                                    </p>
                                </div>
                                <div class='project__images main-carousel'>
                                    <?php foreach($album->images() as $img): ?>
                                    <img class='carousel-cell-image' data-flickity-lazyload='<?= $img->url() ?>'>
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
