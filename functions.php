<?php
    remove_action("wp_head", "rsd_link");
    remove_action("wp_head", "wlwmanifest_link");
    remove_action("wp_head", "generator");
    show_admin_bar(false);

    require_once ( get_stylesheet_directory() . '/theme-options.php' );

    add_theme_support('post-thumbnails');