<?php

/**
 * Plugin Name:       Video Management
 * Description:       Simple Video Management Plugin
 * Plugin URI:        #
 * Version:           1.0.0
 * Author:            Robiul Islam
 * Author URI:        https://robiul-islam.netlify.app
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:      r_video_management
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';
/**
 * Creating final class for stooping instance create
 */

final class RVM_Video_Management {

    // plugin version
    const version = "1.0.0";

    // create $instance
    public static $instance;

    /**
     * Create a class constructor method
     */
    private function __construct() {

        // call constant method
        $this->define_constant();

        // init hook
        add_action( 'init', array($this, 'rvm_initialize') );

        // after activation run plugin_loaded hook
        add_action( 'plugin_loaded', [$this, 'rvm_init_plugin'] );

    }

    /**
     * init hook call this function
     * Only do work which need to run init
     * @return void
     */
    public function rvm_initialize(){
        $menu = new Video\Management\Admin\Video_Post_Type();
        $menu->rvm_video_post_type();
        $menu->rvm_video_category();
    }

    /**
     * After install this function will be call
     * 
     * @return void
     */
    public function rvm_init_plugin(){
        
    }

    /**
     * Create a method for get the class instance
     */
    public static function getInstance() {

        if ( !self::$instance ) {

            self::$instance = new self();

        }

        return self::$instance;
    }

    /**
     * Create all constant variable here
     * 
     * @return void
     */
    public function define_constant() {
        define( 'R_VIDEO_MANAGEMENT_VERSION', self::version );
        define( 'R_VIDEO_MANAGEMENT_FILE', __FILE__ );
        define( 'R_VIDEO_MANAGEMENT_PATH', __DIR__ );
        define( 'R_VIDEO_MANAGEMENT_URL', plugins_url( '', R_VIDEO_MANAGEMENT_FILE ) );
        define( 'R_VIDEO_MANAGEMENT_ASSETS', R_VIDEO_MANAGEMENT_URL . '/assets' );
    }
}

/**
 * Create a function for call
 */
function rvm_video_management() {
    return RVM_Video_Management::getInstance();
}

// kick if the class
rvm_video_management();