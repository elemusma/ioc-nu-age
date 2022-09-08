<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(get_field('header', 'options')) { the_field('header', 'options'); } ?>
<?php if(get_field('custom_css')) { ?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(get_field('body','options')) { the_field('body','options'); } ?>
<div class="blank-space"></div>
<header class="position-relative pt-3 pb-3 z-3 box-shadow bg-white w-100" style="top:0;left:0;">

<div class="nav">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-2 col-md-6 mobile-hidden">

</div>
<div class="col-lg-2 col-md-6 mobile-hidden">
<?php wp_nav_menu(array(
'menu' => 'Left',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
)); ?>
</div>

<div class="col-lg-4 col-9">
<a href="<?php echo home_url(); ?>">
<?php 
$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto']); 
}
?>
</a>
</div>

<div class="col-lg-2 col-md-6 mobile-hidden">
<?php wp_nav_menu(array(
'menu' => 'Right',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
)); ?>
</div>
<!-- <div class="col-1">

</div> -->
<div class="col-lg-2 col-md-6 mobile-hidden">
<?php wp_nav_menu(array(
'menu' => 'Contact',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-end mb-0'
)); ?>
</div>
<div class="col-lg-4 col-3 desktop-hidden">
<a id="navToggle" class="nav-toggle">
<div>
<div class="line-1 bg-accent"></div>
<div class="line-2 bg-accent"></div>
<div class="line-3 bg-accent"></div>
</div>
</a>
</div>
<div id="navMenuOverlay" class="position-fixed z-2"></div>
<div class="col-md-6 col-10 nav-items bg-white desktop-hidden" id="navItems">

<div class="pt-5 pb-5">
<div class="close-menu">
<div>
<span id="navMenuClose" class="close h1">X</span>
</div>
</div>
<a href="<?php echo home_url(); ?>">
<?php 
$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}

echo '</a>';
echo '</div>';

wp_nav_menu(array(
'menu' => 'Left',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
));
wp_nav_menu(array(
'menu' => 'Right',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
));
wp_nav_menu(array(
'menu' => 'Contact',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-end mb-0'
));

echo '<div class="pt-5"></div>';

$galleryFooter = get_field('footer_gallery','options');

if( $galleryFooter ): 
echo '<div class="row justify-content-center pb-5">';
foreach( $galleryFooter as $image ):
echo '<div class="col-4 text-center">';
echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 img-portfolio','style'=>'height:auto;object-fit:contain;'] );
echo '<div class="pb-3"></div>';
echo '<br>';
echo '</div>';
endforeach; 
echo '</div>';
endif;


echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';

echo '<section class="hero position-relative overflow-h" style="">';
$globalPlaceholderImg = get_field('global_placeholder_image','options');
if(is_page()){
if(has_post_thumbnail()){
echo '<div class="position-absolute h-100 bg-attachment" style="top:0;left:0;background:url(' . get_the_post_thumbnail_url() . ');background-attachment:fixed;background-size: cover;
background-position: right;
background-repeat: no-repeat;">';

the_post_thumbnail('full',array('class'=>'w-auto h-100','style'=>'opacity:0;pointer-events:none;'));

echo '<div class="position-absolute w-100 h-100" style="background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,0) 70%, rgba(255,255,255,0.6) 85%, rgba(255,255,255,1) 100%);top:0;left:0;"></div>';

echo '</div>';
// the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute'));
// echo '</div>';
} elseif($globalPlaceholderImg) {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}
} elseif($globalPlaceholderImg) {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}




if(is_front_page()) {
echo '<div class="" style="padding:350px 0 50px;">';
// echo '<div class="position-relative">';
// echo '<div class="multiply overlay position-absolute w-100 h-100 bg-img"></div>';
// echo '<div class="position-relative">';
// echo '<div class="container">';
// echo '<div class="row">';
// echo '<div class="col-12">';

echo '<div class="hero-content position-relative overflow-h">';
echo '<h1 class="pt-3 pb-3 mb-0 bg-accent-secondary text-white position-relative text-center" style="letter-spacing:0.2em;">' . get_the_title() . '</h1>';
echo '<div class="pl-5 pt-2 pb-2" style="background:rgba(255,255,255,.60);">';

echo '<div class="pl-4 pr-4" style="border-left:2px solid var(--accent-primary);">';
if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
endif; 
echo '</div>';

echo '</div>';
echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
echo '</div>';
}



// if(!is_front_page()) {
// echo '<div class="container pt-5 pb-5 text-white text-center">';
// echo '<div class="row">';
// echo '<div class="col-md-12">';
// if(is_page() || !is_front_page()){
// echo '<h1 class="">' . get_the_title() . '</h1>';
// } elseif(is_single()){
// echo '<h1 class="">' . get_single_post_title() . '</h1>';
// } elseif(is_author()){
// echo '<h1 class="">Author: ' . get_the_author() . '</h1>';
// } elseif(is_tag()){
// echo '<h1 class="">' . get_single_tag_title() . '</h1>';
// } elseif(is_category()){
// echo '<h1 class="">' . get_single_cat_title() . '</h1>';
// } elseif(is_archive()){
// echo '<h1 class="">' . get_archive_title() . '</h1>';
// }
// echo '</div>';
// echo '</div>';
// echo '</div>';
// }

echo '</section>';
?>