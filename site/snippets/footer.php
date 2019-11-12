<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>



    <footer class="footer">


        <?php if ($site): ?>
        <nav class="footer-nav">
            <ul>
                <li>
                    <a class="footer__logo" href="<?= $site->url() ?>"><span>D.R</span></a>
                    <span>DAVID RODGERS INC.</span>
                </li>
                <?php foreach ($site->social()->toStructure() as $social): ?>
                <li class="social"><a href="<?= $social->url() ?>"><?= $social->platform() ?></a></li>
                <?php endforeach ?>
                <li>
                    <p>
                        <?= $site->address()->kirbytextinline() ?>
                    </p>
                    <p>
                        <?= $site->phone() ?>
                    </p>
                    <p>
                        <a href="emailto:<?= $site->email() ?>"><?= $site->email() ?></a>
                    </p>
                </li>
            </ul>
        </nav>
        <?php endif ?>
        <section class="bottom">
            <a href="<?= url() ?>">&copy; <?= date('Y') ?> / <?= $site->title() ?></a>

            <a class="site-credit" href="https://www.thewondermob.com">Site Credit</a>
        </section>
    </footer>
    </div>
    </div>
    </main>

    <?= js([
          'assets/js/jquery.js',
          'assets/js/imagesloaded.pkgd.min.js',
          'assets/js/flickity.js',
          'assets/js/TweenMax.min.js',
          
        ]) ?>

        <?php if($page->isHomePage()): ?>
        <?= js([ 'assets/js/home.js' ]) ?>
            <?php else: ?>
            <?=js([ 'assets/js/projects.js' ]) ?>
                <?php endif ?>

                </body>

                </html>
