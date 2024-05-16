<?php
// Template Name: Contact
?>
<?php
get_header();?>

<div>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>


<div>
<?php get_template_part('template-parts/bloc-recommandations'); ?>
</div>

<?php get_footer(); 