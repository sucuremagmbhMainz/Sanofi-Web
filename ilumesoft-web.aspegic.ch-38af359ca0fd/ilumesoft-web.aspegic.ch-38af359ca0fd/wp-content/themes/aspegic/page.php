<?php
/**
 * File to show pages
 *
 * @author Ashiqur Rahman
 * @url http://choobs.com
 **/
get_header();
?>
<section id="page_content">
    <div class="section-content page-content text-center white-bg">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <div class="page-body text-justify">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php
get_footer();