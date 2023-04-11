<?php get_header() ?>

<!-- Site Content Start -->
<main id="main" class="main-content">
    <div class="main-content-wrapper">
       <?php
	   if ( have_posts() ) {
		   while ( have_posts() ) {
			   the_post();
			   the_content();
		   }
	   } else {
		   echo '<h1>404 Error: Page Not Found</h1>';
	   }
       ?>
    </div>
</main>
<!-- Site Content End -->

<?php get_footer() ?>
