<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Freaky Link Theme">
    <meta name="author" content="https://chena.dev/">
    <title>Freaky Link Theme</title>

    <?php wp_head(); ?>
</head>

<body class="content">
    <header>
        <div class="container">
            <div class="left">
                <img routerLink="/" src="../../../../assets/freaky_link_logo.png" alt="Logo for the Freaky Link" />
                <a routerLink="/" class="logo">The Freaky Link</a>
            </div>
            <nav>
                <ul>
                    <li *ngIf="!user.token">
                        <a routerLink="/login">Login</a>
                    </li>
                    <li *ngIf="isAuth" class="menuContainer">
                        <a>{{ user.name }}</a>
                        <div class="menu">
                            <a routerLink="/profile" (click)="closeMenu()">Profile</a>
                            <a routerLink="/orders" (click)="closeMenu()">Orders</a>
                            <a (click)="logout()">Logout</a>
                        </div>
                    </li>
                    <li class="cart">
                        <a routerLink="/cart-page">Cart <span *ngIf="cartQuantity">{{ cartQuantity }}</span></a>
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

    <div class="container">
        <div class="introduction">
            <app-search></app-search>
            <div class="content">
                <div class="text">
                    <h1>The Freaky Link</h1>
                    <p class="introText">
                        We only have one mission: to make the world a better place by
                        delivering pleasure. We aim to provide a discreet online environment
                        for you to shop from the comfort of wherever you are, with full
                        assurance that you’ll get exactly what you desire.
                    </p>
                    <button routerLink="/home" type="button">Explore More!</button>
                </div>
                <div class="main">
                    <a routerLink="/home">
                        <img src="../../../../assets/lingerie_1.jpeg" alt="Woman in dress and tutu sitting on floor seductively." /></a>
                </div>
            </div>
        </div>
        <div class="categories">
            <h2>Choose Your Desire</h2>
            <div class="categories1">
                <div class="categoriesContainer">
                    <div class="choose">
                        <a routerLink="/home"><img src="../../../../assets/lady_lingerie.jpg" alt="Black and white image of woman in hat in the shadow." /></a>
                        <div class="link">
                            <a routerLink="/home">For Her</a>
                        </div>
                    </div>
                    <div class="choose">
                        <a routerLink="/home"><img src="../../../../assets/men_lingerie.jpg" alt="Man's face photographed in the shadow." /></a>
                        <div class="link">
                            <a routerLink="/home">For Him</a>
                        </div>
                    </div>
                    <div class="choose">
                        <a routerLink="/home"><img src="../../../../assets/lady_lingerie_3.jpg" alt="Flat lay image of red bra and flowers." /></a>
                        <div class="link">
                            <a routerLink="/home">Lingerie</a>
                        </div>
                    </div>
                    <div class="choose">
                        <a routerLink="/home"><img src="../../../../assets/accessories.jpg" alt="Perfume bottle photographed against leaves and black background." /></a>
                        <div class="link">
                            <a routerLink="/home">Accessories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="quote">
            <div class="slanted">
                <p>
                    <em>People who do not consciously choose to live a sensual lifestyle, in
                        essence, don't take the relationship they have with themselves or
                        others that seriously.</em>
                </p>
            </div>
            <div class="name">
                <p>Lebo Grand, Sensual Lifestyle</p>
            </div>
        </div>
        <div class="contact">
            <div class="contactBox">
                <div class="left">
                    <h2>Interested? Hit us up!</h2>
                    <p>Sign up for regular updates on new sexy products</p>
                </div>
                <div class="right">
                    <button routerLink="/login" type="button">Sign up!</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center py-2 theme-bg-dark">
        <div class="container">

            <p class="copyright"><a href="https://chena.dev/">Chena</a></p>
        </div>

    </footer>


</body>

</html>