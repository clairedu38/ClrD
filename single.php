<?php get_header();
?>
<?php
// Récupération l'id de la publication actuelle
$post_id = get_the_ID();

// Récupération des infos de l'image
$image_vignette = get_field('image_vignette');
$titre = get_the_title();

// Récupération de la catégorie + vérification de la présence d'un terme dans cette catégorie
$expertises = wp_get_post_terms($post_id, 'expertise');
$expertise = $expertises ? $expertises[0]->name : ''; 

?>

    <div class="photo">
        <div>
            <img src="<?php echo esc_url($image_vignette['url']); ?>" alt="<?php echo esc_attr($image_vignette['alt']); ?>">
        </div>
        <div class="description-photo">
            <div>
                <h2><?php echo esc_html($titre); ?></h2>
                       <h4>Expertise : <?php echo esc_html($expertise); ?></h4>
                          </div> 
        </div>
    </div>


<?php get_footer(); 