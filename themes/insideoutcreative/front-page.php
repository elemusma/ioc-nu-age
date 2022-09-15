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

echo '<div class="pt-md-5 pb-md-5"></div>';

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

// // start of technology partners
// if(have_rows('technology_content')): while(have_rows('technology_content')): the_row();
// $gallery = get_sub_field('gallery');

// echo '<section class="pt-5 pb-5 position-relative">';
// echo '<div class="container">';
// echo '<div class="row justify-content-center">';
// echo '<div class="col-md-7 text-center">';

// echo get_sub_field('content');

// echo '</div>';
// echo '</div>';

// if( $gallery ): 
// echo '<div class="technology-carousel owl-carousel owl-theme">';
// // echo '<div class="row justify-content-center">';
// foreach( $gallery as $image ):
// echo '<div class="col-lg-3 col-6 text-center mt-5 mb-5 col-technology">';
// // echo '<div class="position-relative">';
// // echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'m-auto img-portfolio','style'=>'height:75px;width:175px;object-fit:contain;filter:grayscale(1);'] );
// // echo '</a>';
// // echo '</div>';
// echo '</div>';
// endforeach; 
// echo '</div>';
// endif;

// echo '</div>';
// echo '</section>';
// endwhile; endif;
// // end of technology partners

?>

<style>
    .carousel {
  position: relative;
  /* width: 50%; */
  height: 50px; 
  padding: 0 30px;
  margin: 0 auto;
}

.carousel-content {
  position: relative;
  overflow: hidden;
  transition: width .4s;
  height: 100%;
}

.slide {
  height: 100%;
  /* background-color: black; */
  position: absolute;
  z-index: 1;
  transition: left .4s cubic-bezier(.47,.13,.15,.89);
}

/* .slide-2 {
  background-color: green;
}

.slide-3 {
  background-color: red;
}

.slide-4 {
  background-color: purple;
}

.slide-5 {
  background-color: yellow;
} */

.carousel .nav {
  position: absolute;
  top: 20%;
  margin-top: -10px;
  background-color: rgba(150,150,150,.3);
  background-color: var(--accent-secondary);
  width: 40px;
  height: 40px;
  z-index: 2;
  cursor: pointer;
  border-radius: 50%;
  border: none;
  outline: none;
  color: white;
  -webkit-user-select: none;
  display: flex;
    align-items: center;
    justify-content: center;
}

.nav-left {
  left: -25px;
}

.nav-right {
  right: -25px;
}

.carousel-arrow-icon-left {
  margin-left: 5px;
  margin-top: 2px;
}

.carousel-arrow-icon-right {
  margin-left: 7px;
  margin-top: 2px;
}
</style>

<?php

// start of technology partners
if(have_rows('technology_content')): while(have_rows('technology_content')): the_row();
$gallery = get_sub_field('gallery');

echo '<section class="pt-5 pb-5 position-relative">';
echo '<div class="container">';
echo '<div class="row justify-content-center pb-5">';
echo '<div class="col-md-7 text-center">';

echo get_sub_field('content');

echo '</div>';
echo '</div>';

if( $gallery ): 
echo '<div class="carousel custom-carousel">';

echo '<div class="carousel-content">';

foreach( $gallery as $image ):
// echo '<div class="text-center mt-5 mb-5 col-technology">';


echo '<div class="slide slide-1">';
echo wp_get_attachment_image($image['id'], 'full','',['class'=>'m-auto img-portfolio','style'=>'height:50px;width:160px;object-fit:contain;filter:grayscale(1);'] );
echo '</div>';

// echo '</div>';
endforeach; 
echo '</div>';

echo '<div class="d-md-block d-flex justify-content-center">';

// echo '<div class="pt-md-0 pt-5"></div>';

echo '<div class="nav nav-left" id="navLefttArrow" style="opacity:0;">';
echo '<svg style="width:15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg>';
echo '</div>';
echo '<div class="nav nav-right" id="navRightArrow" style="opacity:0;">';
echo '<svg style="width:15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>';
echo '</div>';
echo '</div>';

echo '</div>';
endif;

echo '</div>';

echo '<div class="pb-md-0 pb-5"></div>';

echo '</section>';
endwhile; endif;
// end of technology partners

?>

<script>
    var carousel = document.querySelector('.carousel');
var carouselContent = document.querySelector('.carousel-content');
var slides = document.querySelectorAll('.slide');
var arrayOfSlides = Array.prototype.slice.call(slides);
var carouselDisplaying;
var screenSize;
setScreenSize();
var lengthOfSlide;

function addClone() {
   var lastSlide = carouselContent.lastElementChild.cloneNode(true);
   lastSlide.style.left = (-lengthOfSlide) + "px";
   carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
}
// addClone();

function removeClone() {
  var firstSlide = carouselContent.firstElementChild;
  firstSlide.parentNode.removeChild(firstSlide);
}

function moveSlidesRight() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  var width = 0;

  slidesArray.forEach(function(el, i){
    el.style.left = width + "px";
    width += lengthOfSlide;
  });
  addClone();
}
moveSlidesRight();

function moveSlidesLeft() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  slidesArray = slidesArray.reverse();
  var maxWidth = (slidesArray.length - 1) * lengthOfSlide;

  slidesArray.forEach(function(el, i){
    maxWidth -= lengthOfSlide;
    el.style.left = maxWidth + "px";
  });
}

window.addEventListener('resize', setScreenSize);

function setScreenSize() {
  if ( window.innerWidth >= 992 ) {
    carouselDisplaying = 5;
  } else if ( window.innerWidth >= 767 ) {
    carouselDisplaying = 3;
  } else {
    carouselDisplaying = 2;
  }
  getScreenSize();
}

function getScreenSize() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  lengthOfSlide = ( carousel.offsetWidth  / carouselDisplaying );
  var initialWidth = -lengthOfSlide;
  slidesArray.forEach(function(el) {
    el.style.width = lengthOfSlide + "px";
    el.style.left = initialWidth + "px";
    initialWidth += lengthOfSlide;
  });
}


var rightNav = document.querySelector('.nav-right');
rightNav.addEventListener('click', moveLeft);

var moving = true;
function moveRight() {
  if ( moving ) {
    moving = false;
    var lastSlide = carouselContent.lastElementChild;
    lastSlide.parentNode.removeChild(lastSlide);
    carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
    removeClone();
    var firstSlide = carouselContent.firstElementChild;
    firstSlide.addEventListener('transitionend', activateAgain);
    moveSlidesRight();
  }
}

function activateAgain() {
  var firstSlide = carouselContent.firstElementChild;
  moving = true;
  firstSlide.removeEventListener('transitionend', activateAgain);
}

var leftNav = document.querySelector('.nav-left');
leftNav.addEventListener('click', moveRight);

// var moveLeftAgain = true;

function moveLeft() {
  if ( moving ) {
    moving = false;
    removeClone();
    var firstSlide = carouselContent.firstElementChild;
    firstSlide.addEventListener('transitionend', replaceToEnd);
    moveSlidesLeft();
  }
}

function replaceToEnd() {
  var firstSlide = carouselContent.firstElementChild;
  firstSlide.parentNode.removeChild(firstSlide);
  carouselContent.appendChild(firstSlide);
  firstSlide.style.left = ( (arrayOfSlides.length -1) * lengthOfSlide) + "px";
  addClone();
  moving = true;
  firstSlide.removeEventListener('transitionend', replaceToEnd);
}




carouselContent.addEventListener('mousedown', seeMovement);

var initialX;
var initialPos;
function seeMovement(e) {
  initialX = e.clientX;
  getInitialPos();
  carouselContent.addEventListener('mousemove', slightMove);
  document.addEventListener('mouseup', moveBasedOnMouse);
}

function slightMove(e) {
  if ( moving ) {
    var movingX = e.clientX;
    var difference = initialX - movingX;
    if ( Math.abs(difference) < (lengthOfSlide/4) ) {
      slightMoveSlides(difference);
    }  
  }
}

function getInitialPos() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  initialPos = [];
  slidesArray.forEach(function(el){
    var left = Math.floor( parseInt( el.style.left.slice(0, -2 ) ) ); 
    initialPos.push( left );
  });
}

function slightMoveSlides(newX) {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  slidesArray.forEach(function(el, i){
    var oldLeft = initialPos[i];
    el.style.left = (oldLeft + newX) + "px";
  });
}

function moveBasedOnMouse(e) { 
  var finalX = e.clientX;
  if ( initialX - finalX > 0) {
    moveRight();
  } else if ( initialX - finalX < 0 ) {
    moveLeft();
  }
  document.removeEventListener('mouseup', moveBasedOnMouse);
  carouselContent.removeEventListener('mousemove', slightMove);
}

let customCarousel = document.querySelector('.custom-carousel');
let navLeftArrow = document.querySelector('#navLeftArrow');
let navRightArrow = document.querySelector('#navRightArrow');
// let scrollCarouselVar = 'yes';



function scrollCarousel() {
  // if(cancel == 'yes'){
    // if(scrollCarouselVar = 'yes' ){
      setInterval(function(){ 
        navRightArrow.click();
      }, 2500);
    // }
  // }
}

// if(scrollCarouselVar = 'yes' ){
  scrollCarousel();
// }

// customCarousel.addEventListener('mouseenter',function(){
  // delete window.scrollCarousel();
  // alert('hello');
  // scrollCarousel(cancel);
  // let scrollCarouselVar = 'no';
  // navRightArrow.setAttribute('id','null');
  // delete.navRightArrow();
  // console.log(scrollCarouselVar);
// })


</script>



<?php

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