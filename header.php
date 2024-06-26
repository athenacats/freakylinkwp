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
        <div class="container">
            <div class="left">
                <img href="index.php" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/freaky_link_logo.png" alt="Logo for the Freaky Link" />
                <a routerLink="/" class="logo">The Freaky Link</a>
            </div>
            <nav class="navbar navbar-expand-lg">
                <ul>
                    <li>
                    <?php
                        $user_display_name = display_user_details();
                        if (empty($user_display_name)) {
                            echo '<a href="/login">Login</a>';
                        }
                        ?> 
                    </li>
                    <li class="menuContainer">
                        <?php
                        $user_display_name = display_user_details();
                        if (!empty($user_display_name)) {
                            echo '<a>' . $user_display_name . '</a>';
                        }
                        ?> <div class="menu">
                            <a routerLink="/profile" (click)="closeMenu()">Profile</a>
                            <a routerLink="/orders" (click)="closeMenu()">Orders</a>
                            <a (click)="logout()">Logout</a>
                        </div>
                    </li>
                    <li class="cart">
                        <a routerLink="/cart-page">Cart <span><?php
   echo get_cart_item_count()
    ?></span></a>
                    </li>
                    <li class="themeButton">
                        <button (click)="toggleLightTheme()" class="lighTheme">
                            <svg class="theme" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.5,2C5.71,3.15 4.5,5.18 4.5,7.5C4.5,9.82 5.71,11.85 7.53,13C4.46,13 2,10.54 2,7.5A5.5,5.5 0 0,1 7.5,2M19.07,3.5L20.5,4.93L4.93,20.5L3.5,19.07L19.07,3.5M12.89,5.93L11.41,5L9.97,6L10.39,4.3L9,3.24L10.75,3.12L11.33,1.47L12,3.1L13.73,3.13L12.38,4.26L12.89,5.93M9.59,9.54L8.43,8.81L7.31,9.59L7.65,8.27L6.56,7.44L7.92,7.35L8.37,6.06L8.88,7.33L10.24,7.36L9.19,8.23L9.59,9.54M19,13.5A5.5,5.5 0 0,1 13.5,19C12.28,19 11.15,18.6 10.24,17.93L17.93,10.24C18.6,11.15 19,12.28 19,13.5M14.6,20.08L17.37,18.93L17.13,22.28L14.6,20.08M18.93,17.38L20.08,14.61L22.28,17.15L18.93,17.38M20.08,12.42L18.94,9.64L22.28,9.88L20.08,12.42M9.63,18.93L12.4,20.08L9.87,22.27L9.63,18.93Z" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class='search'>

        <input class="search-input" #s type="text" placeholder="Search Our Catalog" (keyup.enter)="search(s.value)" [value]="searchTerm" />
        <button class="search-button" (click)="search(s.value)">Search</button>

    </div>