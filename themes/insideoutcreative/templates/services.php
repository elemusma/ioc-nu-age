<?php
/**
 * Template Name: Services
 */
get_header(); ?>

<section class="pt-5 pb-5">
<div class="container">
<div class="row position-relative">
<div class="col-12">
<h1 class="ml6">
<span class="text-wrapper">
<span class="letters"><?php the_title(); ?></span>
</span>
</h1>
</div>
<div class="col-md-9">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>

</div>
<div class="row justify-content-center">
<?php
$counterPortfolio = 0;
$portfolioPages = get_field('pages');
if( $portfolioPages ): ?>
<?php foreach( $portfolioPages as $post ): 
$counterPortfolio++;
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
<a href="<?php the_permalink(); ?>" class="col-md-4 text-center mt-3 mb-3 text-white col-portfolio-page" data-aos="fade-up" data-aos-delay="<?php echo $counterPortfolio; ?>00">

<div class="position-relative inner-content h-100">
<div class="pt-5 pb-5 p-4 position-relative h-100 d-flex align-items-center justify-content-center overflow-h">
<?php the_post_thumbnail('medium',array('class'=>'position-absolute w-100 h-100 bg-img')); ?>
<!-- <div class="position-absolute w-100 h-100 bg-black" style="top:0;left:0;opacity:.05;"></div> -->
<div class="pt-5 pb-5 position-relative">
<h4 class="text-shadow"><?php the_title(); ?></h4>
</div>
</div>
</div>

</a>
<?php 
endforeach;
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata();
endif; ?>
</div>
</div>
</section>


<?php get_footer(); ?>