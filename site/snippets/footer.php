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



        <section class="bottom">
            <a class="copywrite" href="<?= url() ?>">&copy;<?= date('Y') ?> David Rodgers Inc</a>

            <ul>

                <?php foreach ($site->social()->toStructure() as $social): ?>
                <li class="social"><a href="<?= $social->url() ?>"><?= $social->platform() ?></a></li>
                <?php endforeach ?>

            </ul>

            <a class="site-credit" href="https://www.thewondermob.com">Site Credit</a>
        </section>
    </footer>


    </div>
    </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/intersection-observer@0.7.0/intersection-observer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@14.0.0/dist/lazyload.min.js"></script>

    <?= js([
          'assets/js/jquery.js',
          'assets/js/imagesloaded.pkgd.min.js',
          'assets/js/flickity.js',
          'assets/js/TweenMax.min.js',
          'assets/js/home.js'
          
        ]) ?>



        </body>

        </html>
