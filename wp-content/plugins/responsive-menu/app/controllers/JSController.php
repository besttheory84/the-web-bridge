<?php





class RM_JSController extends RM_BaseController {

    

        

    /**

     * Prepare our JavaScript for inclusion throughout the site

     *

     * @return null

     * @added 1.0

     */

    

    static function prepare() {



        

        if( ResponsiveMenu::getOption( 'RMExternal' ) ) :



            

            add_action( 'wp_enqueue_scripts', array( 'RM_JSController', 'addExternal' ) );

        

        

        else :



        

            add_action( self::inFooter() ? 'wp_footer' : 'wp_head', array( 'RM_JSController', 'addInline' ) ); 

               

            

        endif;

                

        

    }

    

        

    /**

     * Creates and echos the inline styles if used

     *

     * @return string

     * @added 1.0

     */

    

    static function addInline() {

        

        $opt = ResponsiveMenu::getOptions();

        

        echo ResponsiveMenu::getOption( 'RMMinify' ) == 'minify' ? RM_JSModel::Minify( RM_JSModel::getJs( $opt ) ) : RM_JSModel::getJs( $opt );

            

        

    }

    

        

    /**

     * Adds the external scripts to the site if required

     *

     * @return null

     * @added 1.4

     */

    

    static function addExternal() {

        

        

        wp_enqueue_script( 



            'responsive-menu', 

            RM_Registry::get( 'config', 'plugin_data_uri' ) . 'js/responsive-menu-' . get_current_blog_id() . '.js', 

            'jquery.mobile', 

            '1.0', 

            self::inFooter() 



        );

             

        

    }

    

    

}