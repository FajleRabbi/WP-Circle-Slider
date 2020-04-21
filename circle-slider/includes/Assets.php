<?php

namespace Circle\Slider;

class Assets {
    function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'cs_enqueue_assets']);
    }

    public function get_scripts() {
        return [
            'owl-carousel-script' => [
                'src'     => CS_ASSETS . '/js/owl.carousel.min.js',
                'version' => 'v2.3.4', // filemtime( CS_PATH . '/assets/js/frontend.js' ),
                'deps'    => ['jquery']
            ]
        ];
    }

    public function get_styles() {
        return [
            'owl-carousel-style' => [
                'src'     => CS_ASSETS . '/css/owl.carousel.min.css',
                'version' => 'v2.3.4' //filemtime( CS_PATH . '/assets/css/frontend.css' )
            ],
            'main-style'   => [
                'src'     => CS_ASSETS . '/css/style.css',
                'version' => filemtime(CS_PATH . '/assets/css/style.css')
            ],
//            'cs-admin-style' => [
//                'src' => CS_ASSETS . '/css/admin.css',
//                'version' => filemtime( CS_PATH . '/assets/css/admin.css' )
//            ],
        ];
    }

    public function cs_enqueue_assets() {
        $scripts = $this->get_scripts();

        foreach ($scripts as $handler => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;

            wp_register_script($handler, $script['src'], $deps, $script['version'], true);
        }


        $styles = $this->get_styles();

        foreach ($styles as $handler => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;
            wp_register_style($handler, $style['src'], $deps, $style['version']);
        }

    }
}