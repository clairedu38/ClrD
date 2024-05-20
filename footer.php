<footer>
    <?php 
    $linkedin = get_field('profil_linkedin','12'); 
    $cv = get_field('cv','12'); 
    ?>

    <div class="first-footer">
        <div>
        <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container'      => false, // N'affiche pas le conteneur ul autour du menu
                'menu_class'     => 'footer-menu', 
            ));
        ?>
        </div>
        <div class="logo-footer">
            <div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-ClrD.svg" alt="Logo ClrD"></a>
            </div>
            <div>
            <p>WEB & DESIGN</p> 
            </div>
        </div>
        <div class="footer-contact">
            <h3>Créons quelque <br>chose ensemble.</h3>
            <div>
            <a href="<?php echo home_url('/contact'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-contact.svg" alt="icon pour aller vers la page contact"></a>
            <a href="<?php echo esc_html($cv); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-cv.svg" alt="icon pour télécharger le cv"></a>
            <a href="<?php echo esc_html($linkedin); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-linkedin.svg" alt="icon pour aller voir le profil linkedin"></a>
            </div>
        </div>
    </div>
    <div class="second-footer">
        <p>
        © 2024 Claire Duwig | Graphiste & Webdesigner | <a href="#">Mentions légales</a>
        </p>
    </div>
</footer>
</div>
<?php wp_footer(); ?> 
</body>
</html>