<!doctype html>
<html class="no-js" lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php (!wp_is_mobile(  )) ? body_class() : body_class('bv_mobile_body') ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">

        <?php

        get_template_part('template-parts/header/header-page');
        
        if(!is_woocommerce_activated()) {
            get_template_part('template-parts/header/page-title');
        } else {
            get_template_part('template-parts/header/wc-page-title');
        }//if


        ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">