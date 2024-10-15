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

                <img href="index.php"
                    src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]); ?>"
                    alt="Logo for the Freaky Link" />
                <a routerLink="/" class="logo"><?php echo get_bloginfo('name'); ?></a>
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



                    <ul class="navbar-nav text-sm-center text-md-left">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="post.html"><i class="fas fa-file-alt fa-fw mr-2"></i>Blog Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page.html"><i class="fas fa-file-image fa-fw mr-2"></i>Blog Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="archive.html"><i class="fas fa-archive fa-fw mr-2"></i>Blog Archive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html"><i class="fas fa-envelope fa-fw mr-2"></i>Contact Us</a>
                        </li>

                        <?php
                        $user_display_name = display_user_details();
                        if (empty($user_display_name)) {
                            echo '<li class="nav-item"><a href="/login" class="nav-link"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>';
                        }
                        ?>

                        <?php
                        $user_display_name = display_user_details();
                        if (!empty($user_display_name)) {
                            echo '<li class="menuContainer nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ghost fa-fw mr-2"></i>' . $user_display_name . '</a><div class="menu dropdown-menu">
                            <a class="menuLinks dropdown-item" routerLink="/profile" (click)="closeMenu()">Profile</a>
                            <a class="menuLinks dropdown-item" routerLink="/orders" (click)="closeMenu()">Orders</a>
                            <a class="menuLinks dropdown-item" (click)="logout()">Logout</a>
                        </div>
                        </li>';
                        }
                        ?>

                        <li class="cart nav-item">
                            <a class="nav-link" href=""><i class="fa-solid fa-cart-shopping fa-fw mr-2"></i>Cart <span><?php
                                                                                                                        echo get_cart_item_count()
                                                                                                                        ?></span></a>
                        </li>


                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class='search'>

        <input class="search-input" #s type="text" placeholder="Search Our Catalog" (keyup.enter)="search(s.value)"
            [value]="searchTerm" />
        <button class="search-button" (click)="search(s.value)">Search</button>

    </div>