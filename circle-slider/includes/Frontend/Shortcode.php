<?php

namespace Circle\Slider\Frontend;


/**
 * Class Custom_Post
 * @package Circle\Slider\Admin
 */
class Shortcode {

    /**
     * Shortcode constructor.
     */
    function __construct() {
        add_shortcode('cs_slider_shortcode', [$this, 'render_shortcode']);
    }

    /**
     * Render the shortcode
     *
     * @param $atts
     * @param null $content
     * @return false|string
     */
    public function render_shortcode($atts, $content = '') {

        wp_enqueue_script('owl-carousel-script');
        wp_enqueue_style('owl-carousel-style');
        wp_enqueue_style('main-style');

        extract(shortcode_atts(array(
            'items' => 5,
            'loop' => false,
            'center' => true,
            'autoplay' => 'false',
            'touchDrag' => false,
            'mouseDrag' => false,
            'pullDrag' => false,
            'freeDrag' => false,
            'smartSpeed' => 450,

        ), $atts, 'cs_slider_shortcode'));

        ob_start(); ?>

        <?php
        $cs_slider = new \WP_Query([
            'post_type'      => 'circle_slider',
            'posts_per_page' => 5,
//            'order' => 'DESC'
        ]);
        ?>


        <script>
            jQuery(document).ready(function ($) {

                $('#cs-slider-activation').on('initialized.owl.carousel translate.owl.carousel', function (e) {
                    idx = e.item.index;
                    // $('.owl-item.cs-center').removeClass('cs-center');
                    $('.owl-item.cs-prev').removeClass('cs-prev');
                    $('.owl-item.cs-next').removeClass('cs-next');
                    // $('.owl-item').eq(idx).addClass('cs-center');
                    $('.owl-item').eq(idx - 1).addClass('cs-prev');
                    $('.owl-item').eq(idx + 1).addClass('cs-next');
                });

                $('#cs-slider-activation').owlCarousel({
                    items: 5,
                    center: true,
                    // touchDrag: false,
                    // mouseDrag: false,
                    // pullDrag: false,
                    // freeDrag: false,
                    loop: true,
                    nav: false,
                    // navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    dots: false,
                    // dotsData: true,
                    autoplay: false,
                    smartSpeed: 450,
                    responsive: {
                        0: {
                            items: 4
                        },
                        500: {
                            items:5
                        },
                        800: {
                            items: 5
                        }

                    }
                });
            });
        </script>

        <div class="cs-slider-section">
            <div class="cs-slider-wrap owl-carousel" id="cs-slider-activation">

                <?php while ($cs_slider->have_posts()) : $cs_slider->the_post();
                    $custom_link = get_field('custom_link');
                    $bg_color = get_field('background_color');
                    ?>
                    <a href="<?php echo esc_url($custom_link); ?>">
                        <div class="cs-slider-item" style="background:<?php echo esc_attr($bg_color); ?> url(<?php the_post_thumbnail_url('full'); ?>) center/cover no-repeat; ">
                            <div class="cs-item-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </a>

                <?php endwhile;
                wp_reset_query(); ?>

            </div>
        </div>

        <?php
        $cs_slider_markup = ob_get_clean();
        return $cs_slider_markup;
    }
}
