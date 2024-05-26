<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLaiRe Duwig</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <?php wp_head(); ?> 
</head>

<body>
    <div class="main-container">
        <header>
            <nav class="menu--left" role="navigation">
                <div class="menuToggle">
                    <input type="checkbox"/>
                    <span></span>
                    <span></span>
                    <span></span>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'container'      => false,
                        'menu_class'     => 'menuItem', 
                        ));
                    ?>
                </div>
            </nav>  
        
            <div class="logo-header">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-ClrD.svg" alt="Logo ClrD">
                </a>
            </div>
                     
        </header>