<?php
/**
 * Handle 404 error
 *
 * @author Ashiqur Rahman
 * @url http://choobs.com
 **/
get_header();
?>
<section id="page_content">
    <div class="section-content white-bg text-center error-page">
        <h1 class="text-center">
            <?php _e( 'Something went wrong!', 'aspegic' ); ?>
        </h1>
        <div class="error-message">
            <?php _e( 'Could not find what you are looking for. Please re-check the URL or start from the home page.', 'aspegic' ); ?>
        </div>
    </div>
</section>
<?php
get_footer();