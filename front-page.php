<?php get_header(); ?>

<div class="main-wrapper">
    <?php 
    if(have_posts(  )){
        while(have_posts(  )) {
            the_post(  );
            the_content(  );
        }
    }
    
    ?>
    <div class="introduction">

        <div class="content">
            <div class="text">
                <h1>The Freaky Link</h1>
                <p class="introText">
                    We only have one mission: to make the world a better place by
                    delivering pleasure. We aim to provide a discreet online environment
                    for you to shop from the comfort of wherever you are, with full
                    assurance that you’ll get exactly what you desire.
                </p>
                <button class="default-button" routerLink="/home" type="button">Explore More!</button>
            </div>
            <div class="main">
                <a routerLink="/home">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lingerie_1.jpeg" alt="Woman in dress and tutu sitting on floor seductively." /></a>
            </div>
        </div>
    </div>
    <div class="categories">
        <h2>Choose Your Desire</h2>
        <div class="categories1">
            <div class="categoriesContainer">
                <div class="choose">
                    <a routerLink="/home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lady_lingerie.jpg" alt="Black and white image of woman in hat in the shadow." /></a>
                    <div class="link">
                        <a routerLink="/home">For Her</a>
                    </div>
                </div>
                <div class="choose">
                    <a routerLink="/home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/men_lingerie.jpg" alt="Man's face photographed in the shadow." /></a>
                    <div class="link">
                        <a routerLink="/home">For Him</a>
                    </div>
                </div>
                <div class="choose">
                    <a routerLink="/home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lady_lingerie_3.jpg" alt="Flat lay image of red bra and flowers." /></a>
                    <div class="link">
                        <a routerLink="/home">Lingerie</a>
                    </div>
                </div>
                <div class="choose">
                    <a routerLink="/home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images//accessories.jpg" alt="Perfume bottle photographed against leaves and black background." /></a>
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


<?php get_footer(); ?>