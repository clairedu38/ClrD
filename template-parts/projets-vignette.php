<?php 
$vignette = get_field('image_vignette');
$expertises = get_the_terms(get_the_ID(), 'expertise');
?>

<div class="projet-image">

    <img src="<?php echo esc_url($vignette['url']); ?>" alt="<?php echo esc_attr($vignette['alt']); ?>">

    <!-- Div présente au hover sur l'image -->
    
    <div class="photo-hover">
        <a class="hover-link"href="<?php the_permalink(); ?>"></a>
        <div class="hover-text">
            <h4 class="hover-title"><?php echo get_the_title() ?></h4>
            <p class="hover-category"><?php foreach ($expertises as $expertise) {
                        echo '/  ' . esc_html($expertise->name) . '  </br>' ;
                    } ?>
            </p>  
        </div>
        <div class="hover-arrow">
            <a href="<?php the_permalink(); ?>">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>