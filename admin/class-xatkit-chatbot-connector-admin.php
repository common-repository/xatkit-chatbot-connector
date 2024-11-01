<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/xatkit-chatbot-connector/
 * @since      1.0.0
 * @package    Xatkit_Chatbot_Connector
 * @subpackage Xatkit_Chatbot_Connector\admin
 */

class Xatkit_Chatbot_Connector_Admin {

    /**
     * The ID of this plugin.
     *
     * @access   protected
     * @var      string $plugin_name The ID of this plugin.
     */
    protected $plugin_name;

    /**
     * The version of this plugin.
     *
     * @access   protected
     * @var      string $version The current version of this plugin.
     */
    protected $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        $this->load_dependencies();

    }

    protected function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/class-xatkit-chatbot-connector-admin-display.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/class-xatkit-chatbot-connector-admin-settings.php';
    }


    /**
     * Register the stylesheets for the admin area
     *
     */
    public function enqueue_styles( $hook ) {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'adminCss', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css');
	    wp_enqueue_style( 'select2', plugin_dir_url( __FILE__ ) . 'assets/css/select2.min.css', array(), null, 'all' );
        wp_enqueue_style( 'xatkit_css', plugin_dir_url( __FILE__ ) . 'assets/css/xatkit.min.css', array(), null, 'all' );

	  //  wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' );
    }


    /**
     * Register the JavaScript for the admin area.
     *
     */
    public function enqueue_scripts( $hook ) {
//        wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array('jquery') );
	    wp_enqueue_script('select2', plugin_dir_url( __FILE__ ) . 'assets/js/select2.min.js', array( 'jquery' ), null, false );

	    wp_enqueue_script('adminBot', plugin_dir_url( __FILE__ ) . 'assets/js/adminBot.js', array( 'wp-color-picker' ), null, false );
        wp_enqueue_media();
        $my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
        wp_add_inline_script( 'adminBot', 'const set_to_post_id = '.$my_saved_attachment_post_id , 'before' );

        wp_enqueue_script( 'xatkit_js', plugin_dir_url( __FILE__ ) . 'assets/js/xatkit.min.js', array( 'jquery' ), null, false );

    }



    public function chat_div_window() {
        $options   = get_option( 'settingsXatkitWooPlugin' );
        $options_visibility = get_option( 'settingsXatkitWooVisibility' );
        $enabled   = isset( $options['enableXatkit'] );
        $serverURL = trim( $options['urlXatkit'] );
        $inAdmin   = isset( $options_visibility['visibility']['inAdmin'] );


        if ( $enabled && $inAdmin && $serverURL !== '' ) {
            ?>
            <div id="xatkit-chat"></div>
            <?php
        }
    }


    public function chat_window() {

        $options_visibility = get_option( 'settingsXatkitWooVisibility' );

        // Get Configured Options
        $options_general = get_option( 'settingsXatkitWooPlugin' );
        $configurations = [
            'serverUrl' => esc_url(trim( $options_general['urlXatkit']) ),
            'enabled'   => esc_attr(isset( $options_general['enableXatkit'] )),
            'title'     => esc_html($options_general['widgetTitle']),
            'subtitle'  => esc_html($options_general['widgetSubTitle']),
            'logo'      => esc_html( wp_get_attachment_url( esc_attr($options_general['media']) )),
            'color'     => esc_attr($options_general['color']),
            'apikey'    => esc_attr($options_general['apikey']),
            'inAdmin'   => esc_attr(isset( $options_visibility['visibility']['inAdmin'] )),
            'minimized' => 1, // in the admin we always start the chat minimized
        ];


        $user = wp_get_current_user();
        if ( $user->exists() ) // $username=$user->nickname;
        {
            $configurations['username'] = 'registered';
        }
        else {
            $configurations['username'] = 'anonymous';
        }

        // Check visibility options
        if ( $configurations['inAdmin'] && $configurations['serverUrl'] !== '' ) {  // Check if bot is configured
            $this->printWidget($configurations);
        }
    }

    public function printWidget($configurations) {
        ?>
        <script type='text/javascript'>
            // Renders the chat widget, see https://github.com/xatkit-bot-platform/xatkit-chat-widget for the parameters information
            xatkit.renderXatkitWidget({
                server: "<?php echo esc_url($configurations['serverUrl']);?>",
                apiKey: "<?php echo esc_html($configurations['apikey']); ?>",
                username: "<?php echo esc_html($configurations['username']); ?>",
                widget: {
                    title: "<?php echo addslashes( esc_html($configurations['title']) ); ?>",
                    subtitle: "<?php echo addslashes( esc_html($configurations['subtitle'])); ?>",
                    startMinimized: <?php echo esc_attr($configurations['minimized']); ?>,
                    images: {
                        <?php echo( esc_attr($configurations['logo']) == "" ? '' : 'profileAvatar:' . "'" . esc_attr($configurations['logo']) . "', launcherImage:" . "'" . esc_attr($configurations['logo']) . "'" ); ?>
                    }
                },
                location: {
                    hostname: "<?php echo site_url(); ?>",
                    origin: "<?php echo site_url(); ?>"
                },
                storage: {
                    autoClear: false
                }
            })
        </script>
        <?php
        if (!empty($configurations['color'])) {
            ?>
            <style>
                .xatkit-conversation-container .xatkit-header {
                    background-color: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-full-screen .xatkit-close-button {
                    background-color: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-conversation-container .xatkit-close-button {
                    background-color: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-quick-list-button > .xatkit-quick-button {
                    border: 2px solid <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-quick-list-button > .xatkit-quick-button:active {
                    background: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-quick-list-button > .xatkit-quick-button-selected {
                    background: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-quick-list-button > .xatkit-quick-button-selected:hover {
                    background: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-widget-container > .xatkit-launcher {
                    background-color: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-widget-container > .xatkit-launcher:hover {
                    background-color: <?php echo esc_attr($configurations['color']); ?>;
                }
                .xatkit-widget-container > .xatkit-launcher:focus {
                    background-color: <?php echo esc_attr($configurations['color']); ?>;
                }
            </style>

            <?php
        }
    }



}

