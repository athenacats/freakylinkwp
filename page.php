<?php get_header(); ?>


<div class="main-wrapper px-3 py-5 p-md-5">
    <h1 class="heading text-center"><?php the_title() ?></h1>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();

            get_template_part('template-parts/content', 'page');
        }
    }

    ?>

</div>
</div>


<?php get_footer(); ?>