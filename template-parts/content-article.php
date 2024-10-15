<div class="d-flex flex-column align-items-start">
    <div class="content-header w-100">
        <div class="meta mb-3 te text-center mx-auto"><span class="date"><?php the_date() ?></span>
            <?php the_tags("<span class='tag'><i class='fa fa-tag'></i>", " </span><span class='tag'><i class='fa fa-tag'></i>", " </span>") ?>
            <span class="tag"><i class='fa fa-tag'></i> category</span><span class="comment"><a href="#comments"><i class='fa fa-comment'></i> 3 comments</a></span>
        </div>
    </div>
    <div>
        <?php
        the_content(); ?></div>
</div