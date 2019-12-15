<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates. 
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">


        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">


        <!-- The title tag we show the title of our site and the title of the current page -->
        <title>
            <?= $site->title() ?>
        </title>
        <link rel="stylesheet" href="https://use.typekit.net/uqx8mtr.css">

        <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file. 
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->
        <?= css(['assets/css/index.css', '@auto']) ?>
            <?= css(['assets/css/flickity.css']) ?>
                <script>
                    document.documentElement.className = "js";
                    var supportsCssVars = function() {
                        var e, t = document.createElement("style");
                        return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
                    };
                    supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");

                </script>


    </head>

    <body class="loading">
        <main>
            <div class="page" data-scroll>
                <header class="header">
