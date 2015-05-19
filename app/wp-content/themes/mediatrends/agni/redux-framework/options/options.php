<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */

if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            
                $this->initSettings();
            
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            
            // Dynamically add a section. Can be also used to modify sections/fields
            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
           
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'crispy'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'crispy'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
            }

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../options/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../options/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'crispy'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'crispy'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'crispy'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'crispy') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'crispy'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }




            // ACTUAL DECLARATION OF SECTIONS

            $this->sections[] = array(
                'title' => __('Home Settings', 'crispy'),
                'icon' => 'el-icon-home',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'title' => __('Favicon', 'crispy'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        //'desc' => __('Basic media uploader with disabled URL input field.', 'crispy'),
                        'subtitle' => __('Upload favicon for your website..', 'crispy'),
                    ),
					
                    array(
                        'id' => 'body-background',
                        'type' => 'background',
                        'output' => array('body', '.footer-bg'),
                        'title' => __('Body Background', 'crispy'),
                        'subtitle' => __('Body background with image, color, etc.', 'crispy'),
                    	//'default' => array( 'background-color' => '#fbfbfb', ),
                    ),
                    array(
                        'id' => 'section-font-start',
                        'type' => 'section',
                        'title' => __('Font Combination', 'crispy'),
                        'subtitle' => __('Choose your fonts for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
                    array(
                        'id' => 'font-1',
                        'type' => 'typography',
                        'title' => __('Font 1', 'crispy'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h1, h2, h3, h4, h5, h6,.h1,.h2,.h3,.h4,.h5,.h6 , .milestone .count, #wp-calendar > thead > tr > th, #wp-calendar caption, .pricing-number, .footer-bar #wp-calendar > thead > tr > th, .footer-bar #wp-calendar caption,  '), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h1-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units' => 'em', // Defaults to px
                        'subtitle' => __('Choose your primary font at here..', 'crispy'),
                        'default' => array(
                            'font-weight' => '400',
                            'font-family' => 'Montserrat',
                            'google' => true,),
                    ),
					
                    array(
                        'id' => 'font-2',
                        'type' => 'typography',
                        'title' => __('Font 2', 'crispy'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('body, .default-typo'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('body-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units' => 'em', // Defaults to px
                        'subtitle' => __('choose your secondary font..', 'crispy'),
                        'default' => array(
                            'font-weight' => '300',
                            'font-family' => 'Raleway',
                            'google' => true,),
                    ),
					
                    array(
                        'id' => 'section-font-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
					array(
                        'id' => 'section-font-start',
                        'type' => 'section',
                        'title' => __('Color Combination', 'crispy'),
                        'subtitle' => __('Choose your fonts for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
                    array(
                        'id' => 'color-1',
                        'type' => 'color',
						'transparent' => false,
						'output' => array(  ), 
                        'title' => __('Accent color 1', 'crispy'),
                        'default' => '#2e3d50',
                        'validate' => 'color',
                    ),
					
					array(
                        'id' => 'color-1-bg',
                        'type' => 'color_rgba',
                        'title' => __('Accent color 1 ', 'crispy'),
                        'subtitle' => __('Choose the same color also for this.', 'crispy'),
                        'default' => array('color' => '#2e3d50', 'alpha' => '1.0'),
                        'output' => array('.modern-overlay-hover, .portfolio-thumbnail-content:hover, .member-text-content:hover'),
                        'mode' => 'background',
                        'validate' => 'colorrgba',
                    ),
                    array(
                        'id' => 'color-2',
                        'type' => 'color',
						'transparent' => false,
						'output' => array(  ),
                        'title' => __('Accent color 2', 'crispy'),
                        'default' => '#1bbc9b',
                        'validate' => 'color',
                    ),
					array(
                        'id' => 'color-3',
                        'type' => 'color',
						'transparent' => false,
						'output' => array(  ),
                        'title' => __('Primary color', 'crispy'),
                        'default' => '#333333',
                        'validate' => 'color',
                    ),
					array(
                        'id' => 'color-4',
                        'type' => 'color',
						'transparent' => false,
						'output' => array(  ),
                        'title' => __('Default color', 'crispy'),
                        'default' => '#707070',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'section-font-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'onepage',
                        'type' => 'switch',
                        'title' => __('One Page Site', 'crispy'),
                        'subtitle' => __('Just enable this for one page site!!..', 'crispy'),
                        "default" => 0,
                    ),
					
                    array(
                        'id' => 'responsive',
                        'type' => 'switch',
                        'title' => __('Responsive Website', 'crispy'),
                        'subtitle' => __('keep it on for responsive site!!..', 'crispy'),
                        "default" => 1,
                    ),
					
                    
                    array(
                        'id' => 'analytics-tracking-code',
                        'type' => 'textarea',
                        'title' => __('Tracking Code', 'crispy'),
                        'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'crispy'),
                        'validate' => 'js',
                        'desc' => 'This code should be js... don\'t include script tag!!..',
                    ),
					
                ),
            );



            $this->sections[] = array(
                'type' => 'divide',
            );



            $this->sections[] = array(
                'icon' => 'el-icon-fontsize',
                'title' => __('Header Options', 'crispy'),
                'fields' => array(
					array(
                        'id' => 'logo',
                        'type' => 'media',
                        'title' => __('Logo', 'crispy'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        //'desc' => __('Basic media uploader with disabled URL input field.', 'crispy'),
                        'subtitle' => __('Upload logo for your website..', 'crispy'),
                    ),
					
					array(
                        'id' => 'logo-font',
                        'type' => 'typography',
                        'title' => __('Logo font options', 'crispy'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        //'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('.header-icon .logo-text'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('nav-menu-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units' => 'em', // Defaults to px
                        'subtitle' => __('if you use the text logo, it will be helpful', 'crispy'),
                        'default' => array(
                            'font-style' => '400',
                            'font-family' => 'Montserrat',
                            'google' => true,),
                    ),
					
					array(
                        'id' => 'header-background',
                        'type' => 'background',
						'output' => array( '.header-menu-bg, .nav-menu-content .sub-menu, .nav-menu-content .children'),
						'background-repeat' => false, 
						'background-size' => false,
						'background-attachment' => false,
						'background-position' => false,
						'background-image' => false,
						'transparent' => false,
                        'title' => __('Header background', 'crispy'),
                        'subtitle' => __('Pick the background color for header ', 'crispy'),
                    	'default' => array( 'background-color' => '#ffffff', ),
                    ),
					
					array(
                        'id' => 'header-font',
                        'type' => 'typography',
                        'title' => __('Header font options', 'crispy'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('.nav-menu, .tab-nav-menu'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('.nav-menu'), // An array of CSS selectors to apply this font style to dynamically
                        'units' => 'em', // Defaults to px
                        'subtitle' => __('font for navigation menu ', 'crispy'),
                        'default' => array(
                            'font-style' => '400',
                            'font-family' => 'Raleway',
                            'google' => true,),
                    ),
					array(
                        'id' => 'header-color',
                        'type' => 'color',
						'transparent' => false,
						'output' => array( '.nav-menu >a, .nav-menu-content li >a , .nav-menu-content ul a, .nav-menu-content ul ul a, .tab-nav-menu >a, .tab-nav-menu-content li >a , .tab-nav-menu-content ul a, .tab-nav-menu-content ul ul a' ),
                        'title' => __('Header Menu Navigation color', 'crispy'),
                        'default' => '#333333',
                        'validate' => 'color',
                    ),
					
					array(
                        'id' => 'sticky-header',
                        'type' => 'switch',
                        'title' => __('Sticky Header', 'crispy'),
                        'subtitle' => __('Disable sticky header by turning off', 'crispy'),
                        "default" => 1,
                    ),
					
					array(
                        'id' => 'header-style',
                        'type' => 'select',
                        'title' => __('Header style', 'crispy'),
                        'subtitle' => __('Choose your header layout style', 'crispy'),
                        'desc' => __('This layout will be your main blog page layout', 'crispy'),
                        'options' => array('1' => 'Standard', '2' => 'Alternative'), //Must provide key => value pairs for select options
                        'default' => '1'
                    ),
					
					array(
                        'id' => 'header-shrink',
                        'type' => 'checkbox',
                        'title' => __('Shrink header', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					
					array(
                        'id' => 'social-network-header',
                        'type' => 'switch',
                        'title' => __('Social Network in Header ', 'crispy'),
                        'subtitle' => __('link to social icons..', 'crispy'),
                        "default" => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                    ),
					array(
                        'id' => 'header-facebook',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Facebook', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
                    array(
                        'id' => 'header-twitter',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Twitter', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-googleplus',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Google +', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-behance',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Behance', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-dribbble',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Dribble', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-flickr',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Flickr', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-linkedin',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Linkedin', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-tumblr',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('tumblr', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-instagram',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Instagram', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-pinterest',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Pinterest', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),					
					array(
                        'id' => 'header-github',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('GitHub', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-stackoverflow',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Stack Overflow', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-skype',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Skype', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-youtube',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Youtube', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'header-vimeo',
                        'type' => 'checkbox',
						'required' => array('social-network-header', '=', '1'),
                        'title' => __('Vimeo', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
                    
                )
            );




            $this->sections[] = array(
                'icon' => 'el-icon-website',
                'title' => __('Footer Options', 'crispy'),
                'fields' => array(
                    array(
                        'id' => 'footer-widget',
                        'type' => 'switch',
                        'title' => __('Footer Widget bar', 'crispy'),
                        'subtitle' => __('Disable footer widget by turning off', 'crispy'),
                        "default" => 0,
                    ),
					
					array(
                        'id' => 'footer-logo',
                        'type' => 'media',
						'required' => array('footer-widget', '=', '0'),
                        'title' => __('Footer Logo', 'crispy'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        //'desc' => __('Basic media uploader with disabled URL input field.', 'crispy'),
                        'subtitle' => __('Upload logo to show at bottom of your website..', 'crispy'),
                    ),  
					
					array(
                        'id' => 'footer-background',
                        'type' => 'background',
						'required' => array('footer-widget', '=', '1'),
						'output' => array('#footer-area'),
                        'title' => __('Footer Bar background', 'crispy'),
                        'subtitle' => __('Pick the background color/image for header ', 'crispy'),
                    	'default' => array( 'background-color' => '#333333', ),
                    ), 
					
					array(
                        'id' => 'section-footer-font-start',
                        'type' => 'section',
						'required' => array('footer-widget', '=', '1'),
                        'title' => __('Footer Bar Color Combination', 'crispy'),
                        'subtitle' => __('Choose your fonts for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
                    array(
                        'id' => 'footerbar-color-1',
                        'type' => 'color',
						'required' => array('footer-widget', '=', '1'),
						'transparent' => false,
						'output' => array( '.footer-bar h1, .footer-bar h2, .footer-bar h3, .footer-bar h4, .footer-bar h5, .footer-bar h6' ), 
                        'title' => __('Primary color ', 'crispy'),
                        'subtitle' => __('Pick the primary font color..', 'crispy'),
                        'default' => '#d5d5d5',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'section-footer-font-end',
                        'type' => 'section',
						'required' => array('footer-widget', '=', '1'),
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),                 
                    array(
                        'id' => 'footer-text',
                        'type' => 'editor',
                        'title' => __('Footer Text', 'crispy'),
                        'subtitle' => __('you can type your footer text/content here..', 'crispy'),
                        'default' => 'Developed by <a href="#">AgniDesigns</a>',
                    ),
					array(
                        'id' => 'social-network',
                        'type' => 'switch',
                        'title' => __('Social Network ', 'crispy'),
                        'subtitle' => __('link to social icons..', 'crispy'),
                        "default" => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                    ),
					array(
                        'id' => 'footer-facebook',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Facebook', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
                    array(
                        'id' => 'footer-twitter',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Twitter', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-googleplus',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Google +', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-behance',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Behance', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-dribbble',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Dribble', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-flickr',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Flickr', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-linkedin',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Linkedin', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-tumblr',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('tumblr', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-instagram',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Instagram', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-pinterest',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Pinterest', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),					
					array(
                        'id' => 'footer-github',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('GitHub', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-stackoverflow',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Stack Overflow', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-skype',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Skype', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-youtube',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Youtube', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'footer-vimeo',
                        'type' => 'checkbox',
						'required' => array('social-network', '=', '1'),
                        'title' => __('Vimeo', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
                )
            );

            /**
             *  Note here I used a 'heading' in the sections array construct
             *  This allows you to use a different title on your options page
             * instead of reusing the 'title' value.  This can be done on any 
             * section - kp
             */
            $this->sections[] = array(
                'icon' => 'el-icon-font',
                'title' => __('Blog Options', 'crispy'),
                'fields' => array(
					
					
					array(
                        'id' => 'section-blog-layout-start',
                        'type' => 'section',
                        'title' => __('Blog Layout', 'crispy'),
                        'subtitle' => __('Choose your Blogging options for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
					
					array(
                        'id' => 'blog-layout',
                        'type' => 'select',
                        'title' => __('Content Layout', 'crispy'),
                        'subtitle' => __('Choose your blog layout', 'crispy'),
                        'desc' => __('This layout will be your main blog page layout', 'crispy'),
                        'options' => array('1' => 'Classic', '2' => 'Grid', '3' => 'Masonry', '4' => 'Modern'), //Must provide key => value pairs for select options
                        'default' => '1'
                    ),
					
                    array(
                        'id' => 'section-blog-layout-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
					
					
					array(
                        'id' => 'blog-pagination',
                        'type' => 'radio',
                        'title' => __('Blog Pagination Type', 'crispy'),
                        'subtitle' => __('select your pagination type to display on the blog', 'crispy'),
                        'options' => array('1' => 'Number format', '2' => 'Classic Format'), //Must provide key => value pairs for radio options
                        'default' => '1'
                    ),
                    		
                    array(
                        'id' => 'author-biography',
                        'type' => 'switch',
                        'title' => __('Author Biography', 'crispy'),
                        'subtitle' => __('to display biography at single!!..', 'crispy'),
                        "default" => 1,
                    ),
					array(
                        'id' => 'sharing-option',
                        'type' => 'switch',
                        'title' => __('Share Posts', 'crispy'),
                        'subtitle' => __('Keep this enable.. to share your posts..', 'crispy'),
                        "default" => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                    ),
					array(
                        'id' => 'blog-facebook',
                        'type' => 'checkbox',
						'required' => array('sharing-option', '=', '1'),
                        'title' => __('Facebook', 'crispy'),
                        'subtitle' => __('to share..', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'blog-twitter',
                        'type' => 'checkbox',
						'required' => array('sharing-option', '=', '1'),
                        'title' => __('Twitter', 'crispy'),
                        'subtitle' => __('to tweet..', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'blog-googleplus',
                        'type' => 'checkbox',
						'required' => array('sharing-option', '=', '1'),
                        'title' => __('Google +', 'crispy'),
                        'subtitle' => __('to recommand..', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
                    
                )
            );
			
			$this->sections[] = array(
                'icon' => 'el-icon-eye-open',
                'title' => __('Portfolio Options', 'crispy'),
                'fields' => array(				
                    
					/*array(
                        'id' => 'portfolio-column',
                        'type' => 'radio',
                        'title' => __('Portfolio Columns', 'crispy'),
                        'subtitle' => __('select your column type to display on the portfolio', 'crispy'),
                        'options' => array('6' => '2 Columns', '4' => '3 Columns', '3' => '4 Columns'), //Must provide key => value pairs for radio options
                        'default' => '4'
                    ),
					*/
					array(
                        'id' => 'portfolio-layout',
                        'type' => 'image_select',
                        'title' => __('Portfolio Layout', 'crispy'),
                        'subtitle' => __('Layout for your portfolio page ', 'crispy'),
                        'desc' => __('Choose an image to your portffolio page', 'crispy'),
                        'options' => array(
                            '6' => array('alt' => '2 Column', 'img' => get_template_directory_uri(). '/agni/redux-framework/ReduxCore/assets/img/2-col-portfolio.png'),
                            '4' => array('alt' => '3 Column', 'img' => get_template_directory_uri(). '/agni/redux-framework/ReduxCore/assets/img/3-col-portfolio.png'),
                            '3' => array('alt' => '4 Column', 'img' => get_template_directory_uri(). '/agni/redux-framework/ReduxCore/assets/img/4-col-portfolio.png'),
                            'masonry' => array('alt' => 'Masonry', 'img' => get_template_directory_uri(). '/agni/redux-framework/ReduxCore/assets/img/masonry-portfolio.png'),
                        ), //Must provide key => value(array:title|img) pairs for radio options
                        'default' => '4'
                    ),
					array(
                        'id' => 'portfolio-per-page',
                        'type' => 'text',
                        'title' => __('Number of Portfolio per page', 'crispy'),
                        'subtitle' => __('type the number of post to show in a portfolio page', 'crispy'),
                        'validate' => 'numeric',
                        'default' => '6',
                        'class' => 'small-text'
                    ),
					array(
                        'id' => 'portfolio-sharing-option',
                        'type' => 'switch',
                        'title' => __('Share your work', 'crispy'),
                        'subtitle' => __('Keep this enable.. to share your work..', 'crispy'),
                        "default" => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                    ),
					array(
                        'id' => 'portfolio-facebook',
                        'type' => 'checkbox',
						'required' => array('portfolio-sharing-option', '=', '1'),
                        'title' => __('Facebook', 'crispy'),
                        'subtitle' => __('to share..', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'portfolio-twitter',
                        'type' => 'checkbox',
						'required' => array('portfolio-sharing-option', '=', '1'),
                        'title' => __('Twitter', 'crispy'),
                        'subtitle' => __('to tweet..', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'portfolio-googleplus',
                        'type' => 'checkbox',
						'required' => array('portfolio-sharing-option', '=', '1'),
                        'title' => __('Google +', 'crispy'),
                        'subtitle' => __('to recommand..', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
									
                    
                )
            );
			
            $this->sections[] = array(
                'icon' => 'el-icon-picture',
                'title' => __('Sliders settings', 'crispy'),
                'fields' => array(
					
					// Agni Slider	
					array(
                        'id' => 'section-slideshow-slider-start',
                        'type' => 'section',
                        'title' => __('Slideshow Slider', 'crispy'),
                        'subtitle' => __('Choose your Slideshow options for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'slideshow-slider-duration',
                        'type' => 'slider',
                        'title' => __('Slider Duration ', 'crispy'),
                        'desc' => __('Visible period of your slider in ms', 'crispy'),
                        "default" => "6000",
                        "min" => "2000",
                        "step" => "500",
                        "max" => "10000",
                    ),
                    array(
                        'id' => 'slideshow-slider-animation',
                        'type' => 'radio',
                        'title' => __('Slideshow animation type', 'crispy'),
                        'subtitle' => __('select your Slideshow animation type to display on the slideshow slider', 'crispy'),
                        'options' => array('fade' => 'Fade', 'slide' => 'Slide'), //Must provide key => value pairs for radio options
                        'default' => 'fade'
                    ),
					
					
					array(
                        'id' => 'section-slideshow-slider-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'section-text-slider-start',
                        'type' => 'section',
                        'title' => __('Text Slider', 'crispy'),
                        'subtitle' => __('Choose your text slider options for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'text-slider-duration',
                        'type' => 'slider',
                        'title' => __('Slider Duration ', 'crispy'),
                        'desc' => __('Visible period of your slider in ms', 'crispy'),
                        "default" => "6000",
                        "min" => "2000",
                        "step" => "500",
                        "max" => "10000",
                    ),
                    array(
                        'id' => 'text-slider-animation',
                        'type' => 'radio',
                        'title' => __('Text animation type', 'crispy'),
                        'subtitle' => __('select your Text slider animation type to display on the text slider', 'crispy'),
                        'options' => array('fade' => 'Fade', 'slide' => 'Slide'), //Must provide key => value pairs for radio options
                        'default' => 'slide'
                    ),
					
					
					array(
                        'id' => 'section-text-slider-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'section-image-slider-start',
                        'type' => 'section',
                        'title' => __('Image Slider', 'crispy'),
                        'subtitle' => __('Choose your image slider options for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'image-slider-duration',
                        'type' => 'slider',
                        'title' => __('Slider Duration ', 'crispy'),
                        'desc' => __('Visible period of your slider in ms', 'crispy'),
                        "default" => "6000",
                        "min" => "2000",
                        "step" => "500",
                        "max" => "10000",
                    ),
                    array(
                        'id' => 'image-slider-animation',
                        'type' => 'radio',
                        'title' => __('Image animation type', 'crispy'),
                        'subtitle' => __('select your image slider animation type to display on the image slider', 'crispy'),
                        'options' => array('fade' => 'Fade', 'slide' => 'Slide'), //Must provide key => value pairs for radio options
                        'default' => 'fade'
                    ),
					
					
					array(
                        'id' => 'section-image-slider-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'section-videobg-start',
                        'type' => 'section',
                        'title' => __('Video BG', 'crispy'),
                        'subtitle' => __('Choose your video bg options for your website..', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'video-bg-controls',
                        'type' => 'checkbox',
                        'title' => __('Show Controls', 'crispy'),
                        'default' => '0'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'video-bg-autoplay',
                        'type' => 'checkbox',
                        'title' => __('Auto Play', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					array(
                        'id' => 'video-bg-loop',
                        'type' => 'checkbox',
                        'title' => __('Loop', 'crispy'),
                        'default' => '1'// 1 = on | 0 = off
                    ),
					
					array(
                        'id' => 'video-bg-mute',
                        'type' => 'switch',
                        'title' => __('Mute', 'crispy'),						
                        'desc' => __('Disable this to unmute!!..', 'crispy'),
						'default' => 1,// 1 = on | 0 = off
                        'on' => 'Enable',
                        'off' => 'Disable',
                    ),
											
					array(
                        'id' => 'video-bg-volume',
                        'type' => 'slider',
						'required' => array('video-bg-mute', '=', '0'),
                        'title' => __('Volume', 'crispy'),
                        'desc' => __('sound level of the video by default', 'crispy'),
                        "default" => "50",
                        "min" => "0",
                        "step" => "1",
                        "max" => "100",
                    ),
					
					array(
                        'id' => 'video-bg-quality',
                        'type' => 'radio',
                        'title' => __('Video Quality', 'crispy'),
                        'subtitle' => __('Choose the quality of the video!!..', 'crispy'),
                        'options' => array('default' => 'Default', 'medium' => 'Medium', 'large' => 'Large', 'hd720' => '720p', 'hd1080' => '1080p', 'highres' => 'Maximum quality', ), //Must provide key => value pairs for radio options
                        'default' => 'default'
                    ),
                    
					array(
                        'id' => 'video-bg-start',
                        'type' => 'text',
                        'title' => __('StartAt ', 'crispy'),
                        'subtitle' => __('Set the seconds the video should start at', 'crispy'),
                        'validate' => 'numeric',
                        'default' => '0',
                        'class' => 'small-text'
                    ),
					array(
                        'id' => 'video-bg-stop',
                        'type' => 'text',
                        'title' => __('StopAt', 'crispy'),
                        'subtitle' => __('Set the seconds the video should stop at.. If 0 is ignored.', 'crispy'),
                        'validate' => 'numeric',
                        'default' => '0',
                        'class' => 'small-text'
                    ),
					
					
					array(
                        'id' => 'section-videobg-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
                    
                )
            );
			
			/**
             *  Note here I used a 'heading' in the sections array construct
             *  This allows you to use a different title on your options page
             * instead of reusing the 'title' value.  This can be done on any 
             * section - kp
             */
            $this->sections[] = array(
                'icon' => 'el-icon-font',
                'title' => __('Coming Soon page Options', 'crispy'),
                'fields' => array(
					
					array(
						'id' => 'cs-newsletter-title',
						'type' => 'text',
						'title' => __('News Letter Title', 'crispy'),
						'subtitle' => __('eg. Get notified', 'crispy'),
						'default' => 'GET NOTIFIED',
						'class' => 'small-text'
					),
					array(
						'id' => 'cs-newsletter-desc',
						'type' => 'text',
						'title' => __('News Letter Description', 'crispy'),
						'subtitle' => __('eg. apologies', 'crispy'),
						'default' => 'Apologies!!.. We are really working hard towards to fix the problem!!.. We will be get back you soon!!.. Keep in touch!!!.. ',
						'class' => 'small-text'
					),
					
					array(
                        'id' => 'cs-deadline',
                        'type' => 'text',
                        'title' => __('Counter Deadline', 'crispy'),
						'subtitle' => __('eg. 20 January 2015 10:45:00', 'crispy'),
                        'default' => '20 January 2015 10:45:00',
                        'class' => 'small-text'
                    ),
					
					
					array(
                        'id' => 'cs-info-icon1',
                        'type' => 'text',
                        'title' => __('Icon 1', 'crispy'),
               			'desc' => __('<p class="description">type the icon class to display <strong>eg. icon ion-ios7-location-outline or </strong> for more <strong>http://ionicons.com/</strong> & <strong>http://fortawesome.github.io/Font-Awesome/icons/</strong>  note. while copy/paste the class don\'t forget to add <strong>icon</strong> for ionicons & <strong>fa</strong> for font awesome before the class</p> ', 'crispy'),
                        'default' => 'icon ion-ios7-paperplane-outline',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'cs-info-text1',
                        'type' => 'text',
                        'title' => __('Text 1', 'crispy'),
                        'default' => 'support@someone.com',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'cs-info-icon2',
                        'type' => 'text',
                        'title' => __('Icon 2', 'crispy'),
                        'default' => 'icon ion-ios7-telephone-outline',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'cs-info-text2',
                        'type' => 'text',
                        'title' => __('Text 2', 'crispy'),
                        'default' => '(000) 000-0000',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'cs-mailpoet',
                        'type' => 'text',
                        'title' => __('Mail Poet shortcode', 'crispy'),
						'desc' => __('<p class="description">mail poet subscription form helps to display it on Coming Soon page!!.. eg. [wysija_form id="2"]</p> ', 'crispy'),
                        'default' => '[wysija_form id="2"]',
                        'class' => 'small-text'
                    ),
                    
                )
            );
			
            $this->sections[] = array(
                'icon' => 'el-icon-group',
                'title' => __('Social Network links', 'crispy'),
                'desc' => __('<p class="description">Fill your links for social network..</p>', 'crispy'),
                'fields' => array(
					
					array(
                        'id' => 'section-map-start',
                        'type' => 'section',
                        'title' => __('Google Map setup', 'crispy'),
                        'subtitle' => __('enter the field values as per requirement!!', 'crispy'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
					
					array(
                        'id' => 'google-map-lat',
                        'type' => 'text',
                        'title' => __('Latitude Value', 'crispy'),
                        'subtitle' => __('enter your google map Latitude value', 'crispy'),
                        'validate' => 'numeric',
                        'default' => '10.010509',
                        'class' => 'small-text'
                    ),
					array(
                        'id' => 'google-map-lng',
                        'type' => 'text',
                        'title' => __('Longitude Value', 'crispy'),
                        'subtitle' => __('enter your google map Longitude value', 'crispy'),
                        'validate' => 'numeric',
                        'default' => '77.487774',
                        'class' => 'small-text'
                    ),
				
					array(
                        'id' => 'google-address-1',
                        'type' => 'text',
                        'title' => __('Address Line 1', 'crispy'),
                        'default' => 'AgniDesigns',
                        'class' => 'small-text'
                    ),
					array(
                        'id' => 'google-address-2',
                        'type' => 'text',
                        'title' => __('Address Line 2', 'crispy'),
                        'default' => 'Envato, Level 13, 2 Elizabeth St, Melbourne,',
                        'class' => 'small-text'
                    ),
					array(
                        'id' => 'google-address-3',
                        'type' => 'text',
                        'title' => __('Address Line 3', 'crispy'),
                        'default' => 'Victoria 3000, Australia.',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'section-map-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),
				
					array(
                        'id' => 'facebook-link',
                        'type' => 'text',
                        'title' => __('Facebook Link', 'crispy'),
                        'subtitle' => __('Link your profile page', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://facebook.com/profile'
                    ),
					array(
                        'id' => 'twitter-link',
                        'type' => 'text',
                        'title' => __('Twitter Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://twitter.com/'
                    ),
					array(
                        'id' => 'googleplus-link',
                        'type' => 'text',
                        'title' => __('Google + Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://google.com/'
                    ),
					array(
                        'id' => 'behance-link',
                        'type' => 'text',
                        'title' => __('Behance Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://behance.net/'
                    ),
					array(
                        'id' => 'dribbble-link',
                        'type' => 'text',
                        'title' => __('Dribbble Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://dribbble.com/'
                    ),
					array(
                        'id' => 'flickr-link',
                        'type' => 'text',
                        'title' => __('Flickr Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://flickr.com/'
                    ),
					array(
                        'id' => 'linkedin-link',
                        'type' => 'text',
                        'title' => __('Linkedin Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://linkedin.com/'
                    ),
					array(
                        'id' => 'tumblr-link',
                        'type' => 'text',
                        'title' => __('Tumblr Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://tumblr.com/'
                    ),
					array(
                        'id' => 'instagram-link',
                        'type' => 'text',
                        'title' => __('Instagram Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://instagram.com/'
                    ),
					array(
                        'id' => 'pinterest-link',
                        'type' => 'text',
                        'title' => __('Pinterest Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://pinterest.com/'
                    ),
					array(
                        'id' => 'github-link',
                        'type' => 'text',
                        'title' => __('GitHub Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://github.com/'
                    ),
					array(
                        'id' => 'stackoverflow-link',
                        'type' => 'text',
                        'title' => __('Stack Overflow Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://stackoverflow.com/'
                    ),
					array(
                        'id' => 'skype-link',
                        'type' => 'text',
                        'title' => __('Skype Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://skype.com/'
                    ),
					array(
                        'id' => 'youtube-link',
                        'type' => 'text',
                        'title' => __('Youtube Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://youtube.com/'
                    ),
					array(
                        'id' => 'vimeo-link',
                        'type' => 'text',
                        'title' => __('Vimeo Link', 'crispy'),
                        'validate' => 'url',
                        'default' => 'http://vimeo.com/'
                    ),
                    
                )
            );
			
			
			$this->sections[] = array(
                'icon' => 'el-icon-group',
                'title' => __('Contact footer', 'crispy'),
                'desc' => __('<p class="description">footer additional contact bar</p>', 'crispy'),
                'fields' => array(
					
					array(
                        'id' => 'general-info-icon1',
                        'type' => 'text',
                        'title' => __('Icon 1', 'crispy'),
               			'desc' => __('<p class="description">type the icon class to display <strong>eg. icon ion-ios7-location-outline or </strong> for more <strong>http://ionicons.com/</strong> & <strong>http://fortawesome.github.io/Font-Awesome/icons/</strong>  note. while copy/paste the class don\'t forget to add <strong>icon</strong> for ionicons & <strong>fa</strong> for font awesome before the class</p> ', 'crispy'),
                        'default' => 'icon ion-ios7-location-outline',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'general-info-caption1',
                        'type' => 'text',
                        'title' => __('Caption 1', 'crispy'),
                        'default' => 'HEAD OFFICE',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'general-info-text1',
                        'type' => 'text',
                        'title' => __('Text 1', 'crispy'),
                        'default' => 'AgniDesigns, 19.a 8th street, theni',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'general-info-icon2',
                        'type' => 'text',
                        'title' => __('Icon 2', 'crispy'),
                        'default' => 'icon ion-ios7-telephone-outline',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'general-info-caption2',
                        'type' => 'text',
                        'title' => __('Caption 2', 'crispy'),
                        'default' => 'CALL US',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'general-info-text2',
                        'type' => 'text',
                        'title' => __('Text 2', 'crispy'),
                        'default' => '(000) 000-0000',
                        'class' => 'small-text'
                    ),
					
					
					array(
                        'id' => 'general-info-icon3',
                        'type' => 'text',
                        'title' => __('Icon 3', 'crispy'),
                        'default' => 'icon ion-ios7-paperplane-outline',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'general-info-caption3',
                        'type' => 'text',
                        'title' => __('Caption 3', 'crispy'),
                        'default' => 'QUERIES',
                        'class' => 'small-text'
                    ),
					
					array(
                        'id' => 'general-info-text3',
                        'type' => 'text',
                        'title' => __('Text 3', 'crispy'),
                        'default' => 'support@yourmail.com ',
                        'class' => 'small-text'
                    ),
				
					
                    
                )
            );




            $theme_info = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'crispy') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'crispy') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'crispy') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'crispy') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

            if (file_exists( get_template_directory(). '/README.md')) {
                $this->sections['theme_docs'] = array(
                    'icon' => 'el-icon-list-alt',
                    'title' => __('Documentation', 'crispy'),
                    'fields' => array(
                        array(
                            'id' => '17',
                            'type' => 'raw',
                            'markdown' => true,
                            'content' => get_template_directory_uri(). '/README.md'
                        ),
                    ),
                );
            }//if
            // You can append a new section at any time.
            $this->sections[] = array(
                'icon' => 'el-icon-eye-open',
                'title' => __('Custom coding', 'crispy'),
                'fields' => array(
					 array(
                        'id' => 'tracking-code',
                        'type' => 'textarea',
                        'required' => array('layout', 'equals', '1'),
                        'title' => __('Tracking Code', 'crispy'),
                        'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'crispy'),
                        'validate' => 'js',
                        'desc' => 'Validate that it\'s javascript!',
                    ),
                    array(
                        'id' => 'css-code',
                        'type' => 'ace_editor',
                        'title' => __('CSS Code', 'crispy'),
                        'subtitle' => __('Paste your CSS code here.', 'crispy'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'default' => "#header{\nmargin: 0 auto;\n}"
                    ),
                    array(
                        'id' => 'js-code',
                        'type' => 'ace_editor',
                        'title' => __('JS Code', 'crispy'),
                        'subtitle' => __('Paste your JS code here.', 'crispy'),
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'default' => "jQuery(document).ready(function(){\n\n});"
                    ),
                    
                )
            );

            $this->sections[] = array(
                'type' => 'divide',
            );

            $this->sections[] = array(
                'icon' => 'el-icon-info-sign',
                'title' => __('Theme Information', 'crispy'),
                'fields' => array(
                    array(
                        'id' => 'raw_new_info',
                        'type' => 'raw',
                        'content' => $item_info,
                    )
                ),
            );

            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'crispy'),
                    'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'crispy'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'crispy')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Theme Information 2', 'crispy'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'crispy')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'crispy');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'crispy_options', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Crispy', 'crispy'),
                'page' => __('Crispy', 'crispy'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyBaGfsQ0iSqfGspxwIHsnrMTZ5d6yrEmxA', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => true, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => 27, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => get_template_directory_uri() . '/img/crispy_options.png', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );            
            );


          
        }

    }

    new Redux_Framework_sample_config();
}


/**

  Custom function for the callback referenced above

 */
if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

/**

  Custom function for the callback validation referenced above

 * */
if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation

          if(something) {
          $value = $value;
          } elseif(something else) {
          $error = true;
          $value = $existing_value;
          $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;
