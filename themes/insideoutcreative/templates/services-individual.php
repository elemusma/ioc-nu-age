<?php
/**
 * Template Name: Services Individual
 */
get_header();

if(have_rows('intro_content')):
    while(have_rows('intro_content')): the_row();
    $image = get_sub_field('image');
    $content = get_sub_field('content');
    $link = get_sub_field('button');

if(has_post_thumbnail()){
    echo '<section class="position-relative text-white bg-attachment" style="background: url(' . get_the_post_thumbnail_url() . ');background-size:cover;background-attachment:fixed;background-position:center;padding:200px 0;margin-top:-25px;z-index:1;">';
    echo '<div class="position-absolute w-100 h-100 bg-black" style="opacity:.5;mix-blend-mode:multiply;top:0;left:0;"></div>';
} else {
    echo '<section class="position-relative text-white" style="background: rgb(0,72,131);
    background: radial-gradient(circle, rgba(0,72,131,1) 0%, rgba(0,42,82,1) 100%);padding:200px 0;margin-top:-25px;z-index:-1;">';
}

echo '<div class="container">';
echo '<div class="row">';
// echo '<div class="col-lg-2 col-md-5 col-4 mb-md-0 mb-4">';

// echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-auto']);

// echo '</div>';

echo '<div class="col-lg-9 col-md-10">';
echo '<h1 class="bold">' . get_the_title() . '</h1>';
echo $content;

if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    echo '<a class="bg-white btn btn-lg text-black" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
endif;

echo '</div>';

echo '</div>';
echo '</div>';
echo '</section>';
endwhile;
endif;

// start of repeated section
if(have_rows('content_section')):
echo '<section class="pb-5 bg-attachment text-white position-relative" style="background:url(' . wp_get_attachment_image_url(81,'full') . ');background-size:cover;background-attachment:fixed;padding-top:75px;">';
echo '<div class="position-absolute w-100 h-100 bg-black" style="opacity:.45;mix-blend-mode:multiply;top:0;left:0;"></div>';


echo '<div class="container">';
echo '<div class="row">';
while(have_rows('content_section')): the_row();
$title = get_sub_field('title');
$description = get_sub_field('description');

echo '<div class="col-md-6 mb-5 col-content">';
echo '<div class="row">';
echo '<div class="col-1 pr-0">';
echo '<div class="dropdown-arrow d-inline-block" style="">';
echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-100" fill="var(--accent-primary)"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>';
echo '</div>';
// echo wp_get_attachment_image(2424,'full','',['class'=>'w-100 h-auto mt-2 dropdown-arrow','style'=>'max-width:22.5px;transform:rotate(-90deg);']);
echo '</div>';
echo '<div class="col-11 position-relative">';
echo '<h2>' . $title . '</h2>';

echo '<div class="content-area-height" style="height:45px;overflow:hidden;transition:all .25s ease-in-out;">';
echo '<div class="content-area-inner">';
echo $description;
echo '</div>';
echo '</div>';
echo '<span class="btn bg-accent text-white mt-4 btn-read-more">Read More</span>';
echo '<span class="btn bg-accent text-white mt-4 position-absolute btn-read-less" style="bottom:0;left:15px;">Read Less</span>';

echo '</div>';

echo '</div>';
echo '</div>';

endwhile;
echo '</div>';
echo '</div>';
echo '</section>';
endif;
// end of repeated section

// start of locations
if(have_rows('locations')): while(have_rows('locations')): the_row();
if(get_sub_field('content') || have_rows('location')):

echo '<section class="position-relative bg-light" style="padding:100px 0;" id="locations">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-md-9 text-center pb-5">';
echo get_sub_field('content');
echo '</div>';
echo '</div>';

if(have_rows('location')):
echo '<div class="row">';
while(have_rows('location')): the_row();
$name = get_sub_field('name');
$image = get_sub_field('image');
$content = get_sub_field('content');

echo '<div class="col-md-4 pb-5 text-center">';
echo '<h3 class="h6 pb-4">' . $name . '</h3>';
echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 mb-4','style'=>'height:225px;object-fit:cover;']);

echo $content;
echo '</div>';
endwhile;
echo '</div>';
endif;



echo '</div>';
echo '</section>';
endif; // end of if statement for content or repeaters. The if statement wasn't working properly for some reason

endwhile; endif;
// end of locations

echo '<section class="position-relative" style="padding:100px 0;">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-md-9 text-center">';
echo get_field('contact_section');
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';



get_footer();
?>