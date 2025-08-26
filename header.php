<!DOCTYPE html>
<html <?php echo function_exists('language_attributes') ? language_attributes() : 'lang="pt-BR"'; ?>>
<head>
    <meta charset="<?php echo get_bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo get_bloginfo('name'); ?> - <?php echo get_bloginfo('description'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/DUREFLEX.png">
    <link rel="apple-touch-icon" href="assets/images/DUREFLEX.png">
    <link rel="shortcut icon" href="assets/images/DUREFLEX.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php if (function_exists('wp_head')) wp_head(); ?>
</head>

<body <?php echo function_exists('body_class') ? body_class() : 'class="dureflex-theme"'; ?>>
    <header class="site-header">
        <nav class="navbar">
            <div class="logo">
                <img src="assets/images/DUREFLEX.png" alt="Dureflex - Suprimentos Logísticos" width="240" height="auto" class="logo-img">
            </div>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
                'container' => false,
                'fallback_cb' => false
            ));
            ?>
        </nav>
    </header>