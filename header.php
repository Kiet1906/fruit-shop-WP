<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div style="display:flex;align-items:center;gap:18px;">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/fruit-logo.png" alt="Fruit Shop Logo" class="site-logo" style="max-height:60px;height:auto;width:auto;display:block;" />
            </a>
            <div>
                <h1 class="site-title" style="margin:0;">
                    <a href="<?php echo home_url(); ?>">Fruit Shop</a>
                </h1>
                <p class="site-description" style="margin:0;">Cửa hàng trái cây tươi ngon, an toàn cho sức khỏe!</p>
            </div>
        </div>
    </header>
    <nav class="main-navigation">
        <div class="container">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'nav-menu',
            ));
            ?>
        </div>
    </nav> 