<?php 
$vignette = get_field('image_vignette');
$expertises = get_the_terms(get_the_ID(), 'expertise');
?>

<div class="projet">

    <img src="<?php echo esc_url($vignette['url']); ?>" alt="<?php echo esc_attr($vignette['alt']); ?>">

    <div class="photo-hover">
        <div class="hover-text">
            <h4 class="hover-title"><?php echo get_the_title() ?></h4>
            <p class="hover-category"><?php foreach ($expertises as $expertise) {
                        echo '/  ' . esc_html($expertise->name) . '  ' ;
                    } ?>
            </p>  
        </div>
        <div class="hover-eye">
            <a href="<?php the_permalink(); ?>">
            <img class="eye" src="<?php echo get_template_directory_uri()?>/assets/images/Icon_eye.png" alt=""></a>
        </div>
    </div>
</div>