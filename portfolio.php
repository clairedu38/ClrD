<?php
// Template Name: Portfolio
?>
<?php
get_header();?>

<section>

    <div>
        <h1 class="titre-principal">Découvrez tous mes projets en web et design</h1>
    </div>

    <div class="filtre-expertise">
        <?php $expertises = get_terms('expertise'); // récupération des catégories via ACF ?>
        <div class="option all-option selected">
            <p>Tout</p>
        </div>
        <?php 
        foreach ($expertises as $expertise) { ?>
            <div class="option choice">
            <p><?php echo $expertise->name; ?></p>
        </div>
        <?php 
        } ?>
    </div>

    <div class="catalogue-projet portfolio">
        
    </div>

</section>

<?php get_footer(); 