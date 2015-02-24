<?php





class RM_HTMLController extends RM_BaseController {

    

    

    /**

     * Prepare the HTML for display on the front end

     *

     * @return null

     * @added 1.0

     */

    

    static function prepare() {

        

        

        if( !ResponsiveMenu::getOption( 'RMShortcode' ) )

            add_action( 'wp_footer', array( 'RM_HTMLController', 'display' ) );

        

        

    }

    

    

    /**

     * Creates the view for the menu and echos it out

     *

     * @return string

     * @added 1.0

     */

    

    static function display( $args = null ) {

        

        /* Unfortunately this messy section is due to shortcodes converting all args to lowercase */

        

        if( $args ) :

            

            if( $args['rm'] )

                $args['RM'] = $args['rm'];

            

        endif;

        

        RM_View::make( 'menu', $args ? array_merge( ResponsiveMenu::getOptions(), $args ) : ResponsiveMenu::getOptions() );

     

        

    }

    

    

}