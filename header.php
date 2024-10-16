<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Freaky Link Theme">
    <meta name="author" content="https://chena.dev/">


    <?php wp_head(); ?>
</head>

<body>
    <header class="page-title">
        <div class="header-container">
            <div class="left">
                <a href="/">
                    <img href="/"
                        src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]); ?>"
                        alt="<?php echo get_bloginfo('name'); ?>" /> </a>
                <a href="/" class="logo cursor-pointer"><?php echo get_bloginfo('name'); ?></a>
            </div>
            <?php
            wp_nav_menu(
                array(
                    'menu' => 'primary',
                    'container' => '',
                    'theme_location' => 'primary',
                )
            );
            ?>
            <nav class="navbar navbar-expand-lg">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation"
                    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navigation" class="collapse navbar-collapse flex-column">

                    <?php
                    wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul id="" class="navbar-nav text-sm-center text-md-left">%3$s</ul>',
                            'walker' => new Custom_Walker_Nav_Menu(),
                        )

                    )
                    ?>
                </div>
            </nav>
        </div>

    </header>
    <div class="widget-bar py-2"><?php dynamic_sidebar() ?></div>
    <div class='search'>

        <input class="search-input" #s type="text" placeholder="Search Our Catalog" (keyup.enter)="search(s.value)"
            [value]="searchTerm" />
        <button class="search-button" (click)="search(s.value)">Search</button>

    </div>