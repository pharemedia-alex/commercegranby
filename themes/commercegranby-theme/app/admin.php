<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/*
 * Customize admin logo
 */
add_action( 'login_enqueue_scripts', function() {

?>
    <style type="text/css">
        body.login {
            background-color: #b63620;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo \App\asset_path('images/admin/cdct-logo_white.png'); ?>);
            height: 100px;
            width: 100%;
            background-size: contain;
            background-repeat: no-repeat;
        }
        .login form#loginform {
            background-color: #fff;
            border-color: transparent;
            border-radius: 10px;
        }
        .login form label{
            color: #2c2c2c;
        }
        .login form input[type="text"],
        .login form input[type="password"] {
            border-color: #2c2c2c;
        }
        .login form {
            border-radius: 8px;
        }
        .login a {
            color: #FFF !important;
        }
        .login #wp-submit {
            background: #2c2c2c;
            border-color: #2c2c2c #2c2c2c #2c2c2c;
            box-shadow: 0 1px 0 #2c2c2c;
            color: #fff;
            text-decoration: none;
            text-shadow: 0 -1px 1px #2c2c2c, 1px 0 1px #2c2c2c, 0 1px 1px #2c2c2c, -1px 0 1px #2c2c2c;
        }
        .login #backtoblog,
        .login #nav {
            display: none !important;
        }
        /*.login #shibboleth-wrap {
            display: none !important;
        }*/
        #login .privacy-policy-page-link {
            display: none;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            _elLoginError = document.querySelector('.login #login_error');
            if(typeof(_elLoginError) != 'undefined' && _elLoginError != null){
                _elLoginError.textContent = 'Veuillez vérifier vos informations de connexion';
            }
        });
    </script>
<?php
} );

add_action( 'admin_enqueue_scripts', function() {
?>
    <style type="text/css">
        .acf-bl.acf-swatch-list li {
            display: inline-block;
            margin-right: 20px;
        }
    </style>
<?php
} );