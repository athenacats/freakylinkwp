<?php get_header(); ?>


<div class="main-wrapper px-3 py-5 p-md-5">
    <h1 class="heading"><?php the_title() ?></h1>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }

    ?>

</div>


<?php get_footer(); ?>