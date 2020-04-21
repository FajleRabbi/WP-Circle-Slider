<?php
/**
 * Plugin Name: Circle Slider
 * Description: A circle slider shortcode with owl-carousel slider
 * Plugin URI: https://fajlerabbi.me
 * Author: Fajle Rabbi
 * Author URI: https://fajlerabbi.me
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: circle-slider
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/tgm.php';

/**
 * Plugin main class
 */
final class Circle_Slider{

    const VERSION = '1.0';

    /**
     * Constructs a new instance.
     */
    private function __construct(){
        $this->define_contants();
        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return Circle_Slider
     */
    public static function init(){

        static $instance = false;

        if ( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the require plugin contants
     */
    public function define_contants(){
        define('CS_VERSION', self::VERSION);
        define('CS_FILE', __FILE__);
        define('CS_PATH', __DIR__);
        define('CS_URL', plugins_url( '', CS_FILE ));
        define('CS_ASSETS', CS_URL . '/assets');
    }

    /**
     * Initializes the plugin.
     */
    public function init_plugin(){
        new Circle\Slider\Assets();
        if ( is_admin() ) {
            new Circle\Slider\Admin();
        }else {
            new Circle\Slider\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activation
     */
    public function activate(){

        $installed = get_option( 'cs_installed' );

        if ( !$installed ) {
            $installed = update_option( 'cs_installed', time() );
        }

        update_option( 'cs_version', CS_VERSION );

    }


}

/**
 * Initialize the plugin class
 *
 * @return     Circle_Slider
 */
function circle_slider(){
    return Circle_Slider::init();
}

//kick-off the plugin
circle_slider();

