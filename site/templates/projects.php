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

    </header>


    <div class="main__content">

        <a class="back" href="<?= $site->url() ?>">BACK</a>

        <section class="proj featured">
            <span class="section__title">FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED FEATURED</span>
            <ul class="client" data-page="<?= $page->url() ?>">
                <?php foreach ($site->index()->listed()->filterBy("category", "featured", ",") as $album): ?>
                <li class="client-name">
                    <a class="client__title" href="<?= $album->url() ?>">
                        <figure>
                            <!--if ($cover = $album->cover()): 
                         $cover->crop(800, 1000) 
                         #endif -->
                            <figcaption>
                                <?= $album->title() ?>
                            </figcaption>
                        </figure>
                    </a>
                    <a class="client__close">
                        <?php echo file_get_contents("assets/img/close.svg"); ?>
                    </a>
                    <div class="client-content content-loading"></div>
                </li>
                <?php endforeach ?>
            </ul>
        </section>
        <section class="proj recent">
            <span class="section__title">RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT RECENT</span>
            <ul class="client" data-page="<?= $page->url() ?>">
                <?php foreach ($page->children()->listed()->filterBy("category", "recent", ",") as $album): ?>
                <li class="client-name">
                    <a class="client__title" href="<?= $album->url() ?>">
                        <figure>

                            <figcaption>
                                <?= $album->title() ?>
                            </figcaption>
                        </figure>
                    </a>
                    <a class="client__close">
                        <?php echo file_get_contents("assets/img/close.svg"); ?>
                    </a>
                    <div class="client-content content-loading"></div>
                </li>
                <?php endforeach ?>
            </ul>
        </section>

        <?php $numCol = $page->children()->listed()->filterBy("category", "archive", ",")->count()/4;?>

        <?php $cols = $page->children()->listed()->filterBy("category", "archive", ",")->chunk(ceil($numCol));?>

        <section class="proj archive">
            <span class="section__title">ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE ARCHIVE</span>
            <article>

                <?php foreach ($cols as $col): ?>

                <ul class="client" data-page="<?= $page->url() ?>">
                    <?php foreach ($col as $album): ?>
                    <li class="client-name__archive" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="100" data-aos-offset="0">

                        <figure>
                            <img src="<?php echo $album->cover()->resize(null,200)->url() ?>">
                            <figcaption>
                                <?= $album->title() ?>
                            </figcaption>
                        </figure>

                    </li>
                    <?php endforeach ?>
                </ul>

                <?php endforeach ?>
                <span></span>
            </article>
        </section>


        <?php snippet('footer') ?>
