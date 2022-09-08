<?php 

get_header();

// start of intro
if(have_rows('intro_content')): while(have_rows('intro_content')): the_row();
$link = get_sub_field('link');
$popup = get_sub_field('popup');

echo '<section class="position-relative" style="padding:100px 0;">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-md-7 text-center">';

echo get_sub_field('content');

if( $link ): 
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';

if($link_url == '#'){
    echo '<span class="bg-accent-outline btn btn-lg btn-learn-more open-modal" id="btn-learn-more">' . esc_html( $link_title ) . '</span>';

echo '<div class="modal-content btn-learn-more position-fixed w-100 h-100 z-3" style="opacity:0;">';
echo '<div class="bg-overlay"></div>';
echo '<div class="bg-content">';
echo '<div class="bg-content-inner">';
echo '<div class="close" id="">X</div>';
echo '<div>';
echo get_sub_field('popup');
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';

} else {
    echo '<a class="bg-accent-outline btn btn-lg" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
}
endif;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of intro

// start of vision
if(have_rows('vision_content')): while(have_rows('vision_content')): the_row();
$bgImg = get_sub_field('background_image');
$pretitle = get_sub_field('pretitle');
$content = get_sub_field('content');


echo '<section class="position-relative bg-attachment section-vision" style="padding:200px 0;background:url(' . wp_get_attachment_image_url($bgImg['id'], 'full') . ');background-size:cover;background-position:center;">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-6" data-aos="fade-right" data-aos-duration="4000">';

echo '<h6>' . $pretitle . '</h6>';
echo '<div class="divider"></div>';
echo $content;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of vision

// start of values
$valuesBgImg = get_field('values_background_image');

echo '<div class="pt-5 pb-5"></div>';

echo wp_get_attachment_image($valuesBgImg['id'],'full','',['class'=>'w-100 h-auto','data-aos'=>'zoom-in']);

echo '<section class="pt-5 pb-5 position-relative" style="">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-lg-10 text-center">';

echo '<h2>' . $valuesBgImg['title'] . '</h2>';

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
// end of values

// start of services
if(have_rows('services_content')): while(have_rows('services_content')): the_row();
$bgImg = get_sub_field('background_image');
$content = get_sub_field('content');
$relationship = get_sub_field('relationship');

echo '<section class="pt-5 pb-5 position-relative bg-attachment" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;">';
echo '<div class="position-relative pt-5 pb-5">';
echo '<div class="position-absolute w-100 h-100 bg-accent-secondary" style="mix-blend-mode:screen;opacity:.62;top:0;left:0;pointer-events:none;"></div>';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-lg-10 text-center text-white pb-5">';

echo $content;

echo '</div>';
echo '</div>';


if( $relationship ):
    echo '<div class="row justify-content-center">';
    $counter = 0;
foreach( $relationship as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
$counter++;
echo '<div class="col-md-4 text-white mb-4">';
echo '<div class="position-relative pt-4 pr-4 pl-4 h-100 d-flex align-items-end col-services" style="background:rgba(0,0,0,.45);">';

echo '<a href="' . get_the_permalink() . '" class="position-absolute w-100 h-100 bg-accent-secondary d-flex align-items-center justify-content-center z-2 col-services-link" style="top:0;left:0;border:4px solid var(--accent-quaternary);opacity:0;pointer-events:none;text-decoration:none;">';

echo '<h6 class="mb-0 bold" style="">' . get_the_title() . '</h6>';

echo '</a>';

echo '<div class="w-100">';
echo '<span class="h1 pb-5 d-inline-block">' . str_pad($counter, 2, '0', STR_PAD_LEFT) . '</span>';

echo '<div class="row align-items-baseline">';
echo '<div class="col-md-2 pb-lg-0 pb-3 text-white">';

echo '<div class="" style="border:1px solid var(--accent-tertiary);border-radius:50%;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;">';
echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:15px;" fill="white"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>';
echo '</div>';

echo '</div>';

echo '<div class="col-lg-5 text-white">';
echo '<h6 class="mb-0 pb-4" style="border-bottom:10px solid var(--accent-primary);"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
endforeach;
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); 
echo '</div>';
endif;


echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of services

echo '<div class="pt-5"></div>';

// start of integrity
if(have_rows('integrity_content')): while(have_rows('integrity_content')): the_row();
$bgImg = get_sub_field('background_image');
$pretitle = get_sub_field('pretitle');
$content = get_sub_field('content');


echo '<section class="position-relative bg-attachment" style="padding:200px 0;background:url(' . wp_get_attachment_image_url($bgImg['id'], 'full') . ');background-size:cover;background-attachment:fixed;background-position:center;border-top:25px solid #ebebeb;border-bottom:25px solid #ebebeb;">';
echo '<div class="container">';
echo '<div class="row justify-content-end">';
echo '<div class="col-md-6" data-aos="fade-left">';

echo '<h6>' . $pretitle . '</h6>';
echo '<div class="divider"></div>';
echo $content;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of integrity

echo '<div class="pt-5"></div>';

// start of architects
if(have_rows('architects_content')): while(have_rows('architects_content')): the_row();
$bgImg = get_sub_field('background_image');
$pretitle = get_sub_field('pretitle');
$content = get_sub_field('content');


echo '<section class="position-relative bg-attachment text-white" style="padding:200px 0;background:url(' . wp_get_attachment_image_url($bgImg, 'full') . ');background-size:cover;background-attachment:fixed;background-position:center;border-top:25px solid var(--accent-secondary);border-bottom:25px solid var(--accent-secondary);">';
echo '<div class="container">';
echo '<div class="row justify-content-start">';
echo '<div class="col-md-6" data-aos="fade-right">';

echo '<h6>' . $pretitle . '</h6>';
echo '<div class="divider"></div>';
echo $content;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of architects

// start of technology partners
if(have_rows('technology_content')): while(have_rows('technology_content')): the_row();
$gallery = get_sub_field('gallery');

echo '<section class="pt-5 pb-5 position-relative">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-md-7 text-center">';

echo get_sub_field('content');

echo '</div>';
echo '</div>';

if( $gallery ): 
echo '<div class="technology-carousel owl-carousel owl-theme">';
// echo '<div class="row justify-content-center">';
foreach( $gallery as $image ):
echo '<div class="col-lg-3 col-6 text-center mt-5 mb-5 col-technology">';
// echo '<div class="position-relative">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
echo wp_get_attachment_image($image['id'], 'full','',['class'=>'m-auto img-portfolio','style'=>'height:75px;width:175px;object-fit:contain;filter:grayscale(1);'] );
// echo '</a>';
// echo '</div>';
echo '</div>';
endforeach; 
echo '</div>';
endif;

echo '</div>';
echo '</section>';
endwhile; endif;
// end of technology partners

// start of architects
if(have_rows('unique_content')): while(have_rows('unique_content')): the_row();
$bgImg = get_sub_field('background_image');
$pretitle = get_sub_field('pretitle');
$content = get_sub_field('content');


echo '<section class="position-relative bg-attachment text-white" style="padding:200px 0;background:url(' . wp_get_attachment_image_url($bgImg['id'], 'full') . ');background-size:cover;background-attachment:fixed;background-position:center;">';
echo '<div class="position-absolute w-100 h-100" style="mix-blend-mode:multiply;top:0;background:rgba(0,0,0,.55);"></div>';
echo '<div class="container">';
echo '<div class="row justify-content-end">';
echo '<div class="col-md-6" data-aos="fade-right">';

echo '<h6>' . $pretitle . '</h6>';
echo '<div class="divider"></div>';
echo $content;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of architects

// echo get_template_part('partials/join-list-banner');

// how to use new image hover effect
// echo '<div class="col-6 col-intro-gallery col mb-1 p-1 overflow-h">';
// echo '<div class="position-relative img-hover w-100">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 image-intro-gallery','style'=>'object-fit:cover;']);
// echo '</a>';
// echo '</div>';
// echo '</div>';

get_footer(); ?>