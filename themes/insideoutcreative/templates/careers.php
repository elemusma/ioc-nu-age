<?php

/**
 * Template Name: Careers
 */

 get_header();

// start of services
if(have_rows('careers_content')): while(have_rows('careers_content')): the_row();
$bgImg = get_sub_field('background_image');
$content = get_sub_field('content');
// $relationship = get_sub_field('relationship');

echo '<section class="pt-5 pb-5 position-relative bg-attachment" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;">';
echo '<div class="position-relative pt-5 pb-5">';
echo '<div class="position-absolute w-100 h-100 bg-accent-secondary" style="mix-blend-mode:screen;opacity:.62;top:0;left:0;pointer-events:none;"></div>';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-lg-10 text-center text-white pb-5">';

echo $content;

echo '</div>';
echo '</div>';


// if( $relationship ):
if( have_rows('careers_individual') ):
    echo '<div class="row justify-content-center">';
    $counter = 0;
// foreach( $relationship as $post ): 
while( have_rows('careers_individual') ): the_row();
// Setup this post for WP functions (variable must be named $post).
// setup_postdata($post);
$counter++;
echo '<div class="col-md-4 text-white mb-4">';
echo '<div class="position-relative pt-5 pr-4 pl-4 h-100 d-flex align-items-end col-services" style="background:rgba(0,0,0,.45);">';

echo '<div class="pl-4 pr-4 position-absolute w-100 h-100 bg-accent-secondary d-flex align-items-center justify-content-center z-2 col-services-link" style="top:0;left:0;border:4px solid var(--accent-quaternary);opacity:0;pointer-events:none;text-decoration:none;">';

echo '<div>';
echo '<h6 class="mb-0 bold" style="">' . get_sub_field('title') . '</h6>';

echo get_sub_field('careers_individual_content');

echo '<span class="btn bg-white text-accent apply-now open-modal" id="apply-now" style="">Apply Now</span>';

echo '</div>';

echo '</div>';

echo '<div class="w-100">';
echo '<span class="h1 pb-5 d-inline-block">' . str_pad($counter, 2, '0', STR_PAD_LEFT) . '</span>';

echo '<div class="row align-items-baseline">';
echo '<div class="col-md-2 pb-lg-0 pb-3 text-white">';

echo '<div class="" style="border:1px solid var(--accent-tertiary);border-radius:50%;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;">';
echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:15px;" fill="white"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>';
echo '</div>';

echo '</div>';

echo '<div class="col-lg-5 text-white">';
echo '<h6 class="mb-0 pb-4" style="border-bottom:10px solid var(--accent-primary);">' . get_sub_field('title') . '</h6>';
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
// endforeach;
endwhile;
// Reset the global post object so that the rest of the page works correctly.
// wp_reset_postdata(); 
echo '</div>';
endif;


echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of services

echo '<div class="modal-content apply-now position-fixed w-100 h-100 z-3">';
echo '<div class="bg-overlay"></div>';
echo '<div class="bg-content">';
echo '<div class="bg-content-inner">';
echo '<div class="close" id="">X</div>';
echo '<div>';
echo get_field('popup_content');
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';

get_footer();

?>