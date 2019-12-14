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
        <span>DAVID RODGERS INC.</span>
        <!--                    In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername // We do not want to display links to unlisted `error`, `home`, or `sandbox` pages // More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
                    foreach ($site->children()->listed() as $item):
                    $item->title()->link()
                     endforeach-->
    </nav>
    </header>
    <svg height="0">
  <filter id="f1">
    <feTurbulence type="turbulence" baseFrequency="0.05"
        numOctaves="2" result="turbulence"/>
  </filter>
</svg>

    <div class="main__content home-page">

        <?php 
  // we always use an if-statement to check if a page exists to prevent errors 
  // in case the page was deleted or renamed before we call a method like `children()` in this case
     $album = page('projects')->children()->listed()->filterBy("category", "featured", ",")->shuffle()->first() ?>
        <section class="home-featured">
            <article class="client">
                <figure>

                    <?php 
          // the `cover()` method defined in the `album.php` page model can be used 
          // everywhere across the site for this type of page
          if ($cover = $album->cover()): ?>
                    <!--                    <?= $cover->resize(1024, 1024) ?>-->
                    <!--                    new addition-->
                    <div class="item__img-wrap">

                        <div class="item__img" style="background-image: url(<?php echo $cover->url()?>)"></div>
                    </div>
                    <!--                    end new addition-->
                    <?php endif ?>
                    <figcaption>

                        <p class="featured-title">

                            <?= $album->modify()->isEmpty()? $album->title() : $album->modify()->kirbytextinline() ; ?>

                        </p>
                        <div class="featured-bottom">
                            <p class="featured-heading">
                                <?= $album->headline() ?>
                            </p>
                            <p class="featured-sub">
                                <?= $album->subheading() ?>
                            </p>
                        </div>
                    </figcaption>
                </figure>
            </article>

            <a class="more" href="<?= page('projects')->url() ?>">VIEW MORE</a>
        </section>
        <section id="about-agency">
            <p class="about__dark-text">
                <span> <?= $site->agency()->kirbytextinline() ?></span>
            </p>
            <p class="about__light-text grayscale" style="background:center / cover no-repeat url( <?= $site->agencyimage()->toFile()->url() ?>)">
                <span> <?= $site->agency()->kirbytextinline() ?></span>
            </p>

        </section>
        <section id="client-list">
            <?php foreach (page('projects')->children()->listed()->filterBy("category", '!=', 'archive') as $coverImage): ?>

            <img class="grayscale" src="<?php echo $coverImage->cover()->resize(null,300)->url() ?>">

            <?php endforeach ?>

            <span class="section__title">CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS CLIENTS</span>
            <article>
                <?php $site->clients()->toStructure()->isOdd() ? $numChunks = ($site->clients()->toStructure()->count()/2) + 1 : $numChunks = $site->clients()->toStructure()->count()/2; ?>



                <?php $chunks = $site->clients()->toStructure()->chunk($numChunks);?>

                <?php foreach ($chunks as $chunk): ?>

                <ul class="client">
                    <?php foreach ($chunk as $client): ?>
                    <li>
                        <?= $client->client() ?>
                    </li>
                    <?php endforeach ?>
                </ul>
                <?php endforeach ?>
            </article>

        </section>



        <?php snippet('footer') ?>
