<footer>
<section class="pt-5">
<div class="container">
<?php
$galleryFooter = get_field('footer_gallery','options');

if( $galleryFooter ): 
echo '<div class="row justify-content-center pb-5">';
foreach( $galleryFooter as $image ):
echo '<div class="col-lg-3 col-4 text-center">';

echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 img-portfolio pr-md-0 pr-4','style'=>'height:65px;object-fit:contain;'] );

echo '</div>';
endforeach; 
echo '</div>';
endif;

?>

</section>

<section class="pt-5 pb-5 bg-accent-secondary" style="">
    <div class="container">
        <div class="row justify-content-center">
        <?php
    echo '<div class="col-md-5 text-center pb-5">';
echo '<a href="' . home_url() . '">';
$logo = get_field('logo','options'); $logoFooter = get_field('logo_footer','options'); 
if($logoFooter){
echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'w-100 h-auto']); 
} elseif($logo) {
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto']);
}
echo '</a>';

echo get_template_part('partials/si');

echo '</div>';
?>
<div class="col-12 text-center text-white">
<div class="text-gray-1">
<?php the_field('website_message','options'); ?>
	
</div>
</div>
</div>
        </div>
    </div>
</section>


</footer>
<?php if(get_field('footer', 'options')) { the_field('footer', 'options'); } ?>
<?php wp_footer(); ?>
</body>
</html>