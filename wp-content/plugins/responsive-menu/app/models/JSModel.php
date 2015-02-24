<?php



class RM_JSModel extends RM_BaseModel {

    

    

    /**

     * Function to create the file to hold the JS file

     *

     * @param string $js

     * @return file

     * @added 1.6

     */

    

    static function createJSFile( $js ) {



        

        $file = fopen( RM_Registry::get( 'config', 'plugin_data_dir' ) . '/js/responsive-menu-' . get_current_blog_id() . '.js', 'w' );

        

        $jsFile = fwrite( $file, $js );

        

        fclose( $file );

        

        if( !$file ) 

            RM_Status::set( 'error', __( 'Unable to create JS file', 'responsive-menu' ) );

                

        return $jsFile;

        

        

    }  

    

    

    /**

     * Function to format, create and get the JS itself

     *

     * @param array $options

     * @return string

     * @added 1.0

     */

    

    static function getJS( $options ) {

        

        

        $setHeight = $options['RMPos'] == 'fixed' ? '' : " \$RMjQuery( '#responsive-menu' ).css( 'height', \$RMjQuery( document ).height() ); ";

        $breakpoint = empty($options['RMBreak']) ? "600" : $options['RMBreak'];

        

        $RMPushCSS = empty($options['RMPushCSS']) ? "" : $options['RMPushCSS'];



        $slideOpen = $options['RMAnim'] == 'push' && !empty($options['RMPushCSS']) ? " \$RMjQuery( 'body' ).addClass( 'RMPushOpen' ); " : '';

        $slideRemove = $options['RMAnim'] == 'push' && !empty($options['RMPushCSS']) ? " \$RMjQuery( 'body' ).removeClass( 'RMPushOpen' ); " : '';



        /* Added 1.8 */

        switch( $options['RMSide'] ) :

            case 'left' : $side = 'left'; break;

            case 'right' : $side = 'right'; break;

            case 'top' : $side = 'top'; break;

            case 'bottom' : $side = 'top'; break;

            default : $side = 'left'; break;

        endswitch;

                

        /* Added 2.0 */

        switch( $options['RMSide'] ) :

            case 'left' : $width = $options['RMWidth']; $neg = '-'; break;

            case 'right' : $width = $options['RMWidth']; $neg = '-'; break;

            case 'top' : $width = '100'; $neg = '-'; break;

            case 'bottom' : $width = '100'; $neg = ''; break;

            default : $width = '75'; break;

        endswitch;

        

        switch( $options['RMSide']  ) :

            case 'left' : $pushSide = 'left'; $pos = ''; break;

            case 'right' : $pushSide = 'left'; $pos = '-'; break;

            case 'top' : $pushSide = 'marginTop'; $pos = ''; break;

            case 'bottom' : $pushSide = 'marginTop'; $pos = '-'; break;

        endswitch;



        $sideSlideOpen = $side == 'right' && empty( $slideOpen ) ? " \$RMjQuery( 'body' ).addClass( 'RMPushOpen' ); " : '';

        $sideSlideRemove =  $side == 'right' && empty( $slideRemove ) ? " \$RMjQuery( 'body' ).removeClass( 'RMPushOpen' ); " : '';

        

/*

|--------------------------------------------------------------------------

| Slide Push Animation

|--------------------------------------------------------------------------

|

| This is where we deal with the JavaScript needed to change the main lines

| to an X if this option has been set

|

*/

        

$slideOver = null;

      

if( $options['RMAnim'] == 'push' && !empty( $options['RMPushCSS'] ) ) :

    

    if( $options['RMSide'] == 'top' || $options['RMSide'] == 'bottom' ) :

   

        $slideOver = "

        

            var MenuHeight = \$RMjQuery( '#responsive-menu' ).css( 'height' );

        

            \$RMjQuery( '$RMPushCSS' ).animate( { $pushSide: \"{$pos}\" + MenuHeight }, 500, 'linear' );





        ";

        

    else :

        

        $slideOver = "

        

            \$RMjQuery( '$RMPushCSS' ).animate( { $pushSide: \"{$pos}{$width}%\" }, 500, 'linear' );





        ";

        

    endif;



endif;

    

        $slideOverCss = $options['RMAnim'] == 'push' && !empty($options['RMPushCSS']) ? " \$RMjQuery( '$RMPushCSS' ).addClass( 'RMPushSlide' ); " : '';



        $slideBack = $options['RMAnim'] == 'push' && !empty($options['RMPushCSS']) ? " \$RMjQuery( '$RMPushCSS' ).animate( { $pushSide: \"0\" }, 500, 'linear' ); " : '';

        

        $slideOverCssRemove = $options['RMAnim'] == 'push' && !empty($options['RMPushCSS']) ? " \$RMjQuery( '$RMPushCSS' ).removeClass( 'RMPushSlide' ); " : '';



        $speed = empty( $options['RMAnimSpd'] ) ? 500 : $options['RMAnimSpd'] * 1000;



/*

|--------------------------------------------------------------------------

| Change to X or Clicked Menu Image Option

|--------------------------------------------------------------------------

|

| This is where we deal with the JavaScript needed to change the main lines

| to an X or click image if this option has been set

|

*/

        

if( $options['RMX'] || $options['RMClickImgClicked'] ) : 



    $closeX = " \$RMjQuery( '#click-menu #RMX' ).css( 'display', 'none' );

                \$RMjQuery( '#click-menu #RM3Lines' ).css( 'display', 'block' ); ";



    $showX = " \$RMjQuery( '#click-menu #RM3Lines' ).css( 'display', 'none' );

                 \$RMjQuery( '#click-menu #RMX' ).css( 'display', 'block' ); ";        

else :



    $closeX = "";

    $showX = "";



endif;            



/*

|--------------------------------------------------------------------------

| Menu Expansion Options

|--------------------------------------------------------------------------

|

| This is where we deal with the array of expansion options, the current

| combinations are:

|

| - Auto Expand Current Parent Items ['RMExpandPar']

| - Auto Expand Current Parent Items + Auto Expand Sub-Menus ['RMExpandPar'] && ['RMExpand']

| - Auto Expand Sub-Menus ['RMExpand']

| - None !['RMExpandPar'] && !['RMExpand']

|

*/

   

$activeArrow = $options['RMArImgA'] ? '<img src="' . $options['RMArImgA'] . '" />' : json_decode( $options['RMArShpA'] );

$inactiveArrow = $options['RMArImgI'] ? '<img src="' . $options['RMArImgI'] . '" />' : json_decode( $options['RMArShpI'] );





if ( !$options['RMExpand'] ) :



    $clickedLink = '<span class=\"appendLink\">' . $inactiveArrow . '</span>';  

    $clickLink = '<span class=\"appendLink\">' . $inactiveArrow . '</span>';  



else :



    $clickedLink = '<span class=\"appendLink rm-append-active\">' . $activeArrow . '</span>';

    $clickLink = '<span class=\"appendLink rm-append-active\">' . $activeArrow . '</span>'; 



endif;



if( $options['RMExpandPar'] ) :



    $clickedLink = '<span class=\"appendLink rm-append-active\">' . $activeArrow . '</span>';

    $clickLink = '<span class=\"appendLink\">' . $inactiveArrow . '</span>'; 



endif;



if( $options['RMExpandPar'] && $options['RMExpand'] ) :



    $clickedLink = '<span class=\"appendLink rm-append-active\">' . $activeArrow . '</span>';

    $clickLink = '<span class=\"appendLink rm-append-active\">' . $activeArrow . '</span>'; 



endif;

    

        

/*

|--------------------------------------------------------------------------

| Initialise Output

|--------------------------------------------------------------------------

|

| Initialise the JavaScript output variable ready for appending

|

*/   

        

$js = null;

        

/*

|--------------------------------------------------------------------------

| Strip Tags If Needed

|--------------------------------------------------------------------------

|

| Determine whether to use the <script> tags (when using internal scripts)

|

*/       



$js .= $options['RMExternal'] ? '' : '<script>';



/*

|--------------------------------------------------------------------------

| Initial Setup

|--------------------------------------------------------------------------

|

| Setup the initial noConflict and document ready checks

|

*/   



$js .= "



    var \$RMjQuery = jQuery.noConflict();



    \$RMjQuery( document ).ready( function() {

    

";



/*

|--------------------------------------------------------------------------

| Stop Main Parent Item Clicks

|--------------------------------------------------------------------------

|

| Stop clicks on the main parent items if option selected

| Added 2.0

*/ 



if( $options['RMIgnParCli'] ) :



    $js .= "



        \$RMjQuery( '#responsive-menu ul > li.menu-item-has-children' ).children( 'a' ).addClass( 'rm-click-disabled' );



        \$RMjQuery( '#responsive-menu ul > li.menu-item-has-children' ).children( 'a' ).on( 'click', function( e ) {

        

            e.preventDefault();

            

        });



        \$RMjQuery( '#responsive-menu ul > li.page_item_has_children' ).children( 'a' ).addClass( 'rm-click-disabled' );



        \$RMjQuery( '#responsive-menu ul > li.page_item_has_children' ).children( 'a' ).on( 'click', function( e ) {

        

            e.preventDefault();

            

        });

        

    ";



endif;

   

/*

|--------------------------------------------------------------------------

| Closes the menu on page clicks

|--------------------------------------------------------------------------

|

| Close menu on page clicks if required

| Added 2.0

*/ 



if( $options['RMCliToClo'] ) :



    $js .= "



        \$RMjQuery( document ).on( 'click tap', function( e ) { 

        

            if( !\$RMjQuery( e.target ).closest( '#responsive-menu, #click-menu' ).length ) { 

            

                closeRM(); 

                

            } 

        

        });

        

    ";



endif;





 /*

|--------------------------------------------------------------------------

| Click Menu Function

|--------------------------------------------------------------------------

|

| This is our Click Handler to determine whether or not to open or close 

| the menu when the click menu button has been clicked.

|

*/



$js .= "

    

    var isOpen = false;



    \$RMjQuery( document ).on( 'click', '#click-menu', function() {



        $setHeight



        !isOpen ? openRM() : closeRM();



    });



";

        

/*

|--------------------------------------------------------------------------

| Menu Open Function

|--------------------------------------------------------------------------

|

| This is the main function that deals with opening the menu and then sets

| its state to open

|

*/

        

$js.= "

                    

    function openRM() {



        $slideOpen  

        $sideSlideOpen

        $slideOverCss

        $slideOver

        $showX



        \$RMjQuery( '#responsive-menu' ).css( 'display', 'block' ); 

        \$RMjQuery( '#responsive-menu' ).addClass( 'RMOpened' );  

        \$RMjQuery( '#click-menu' ).addClass( 'click-menu-active' );  



        \$RMjQuery( '#responsive-menu' ).stop().animate( { $side: \"0\" }, $speed, 'linear', function() { 



          $setHeight



          isOpen = true;



        } ); 



    }



";

   

/*

|--------------------------------------------------------------------------

| Menu Close Function

|--------------------------------------------------------------------------

|

| This is the main function that deals with Closing the Menu and then sets

| its state to closed

|

*/

        

$js .= "

    

    function closeRM() {



        $slideBack



        \$RMjQuery( '#responsive-menu' ).animate( { $side: \"{$neg}{$width}%\" }, $speed, 'linear', function() { 



            $slideRemove

            $sideSlideRemove

            $slideOverCssRemove

            $closeX

            \$RMjQuery( '#responsive-menu' ).css( 'display', 'none' );  

            \$RMjQuery( '#responsive-menu' ).removeClass( 'RMOpened' );  

            \$RMjQuery( '#click-menu' ).removeClass( 'click-menu-active' ); 



            isOpen = false;



        } );



    }



";



/*

|--------------------------------------------------------------------------

| Menu Resize Function

|--------------------------------------------------------------------------

|

| This is the main function that deals with resizing the page and is used 

| to judge whether the menu needs closing once the screen is resized

|

*/

                        

$js .= "

    

    \$RMjQuery( window ).resize( function() { 



        $setHeight



        if( \$RMjQuery( window ).width() > $breakpoint ) { 



            if( \$RMjQuery( '#responsive-menu' ).css( '$side' ) != '-{$width}%' ) {



                closeRM();



            }



        }



    });



";

        



/*

|--------------------------------------------------------------------------

| Add Toggle Buttons

|--------------------------------------------------------------------------

|

| This is the main section that deals with Adding the correct Toggle buttons

| when needed to the links

|

*/

            

if( !$options['RMExpand'] )

    $js .= "\$RMjQuery( '#responsive-menu ul ul' ).css( 'display', 'none' );";

    

    

$js .= " 

    

    clickLink = '{$clickLink}';

    clickedLink = '{$clickedLink}';

        

    excludeList = '.current-menu-item, .current-menu-ancestor, .current_page_ancestor';

        

    \$RMjQuery( '#responsive-menu .menu-item-has-children' ).not( excludeList ).prepend( clickLink );

    

    \$RMjQuery( '#responsive-menu .page_item_has_children.current-menu-item' ).prepend( clickedLink );  

    \$RMjQuery( '#responsive-menu .page_item_has_children.current-menu-ancestor' ).prepend( clickedLink );    

    \$RMjQuery( '#responsive-menu .menu-item-has-children.current-menu-item' ).prepend( clickedLink ); 

    \$RMjQuery( '#responsive-menu .menu-item-has-children.current-menu-ancestor').prepend( clickedLink );

    

    \$RMjQuery( '#responsive-menu .page_item_has_children' ).not( excludeList ).prepend( clickLink );

    \$RMjQuery( '#responsive-menu .menu-item-has-children.current_page_ancestor' ).prepend( clickedLink ); 

    \$RMjQuery( '#responsive-menu .page_item_has_children.current_page_ancestor' ).prepend( clickedLink );

    

";

                

/*

|--------------------------------------------------------------------------

| Accordion Animation

|--------------------------------------------------------------------------

|

| This is the part that deals with the accordion animation

|

*/     

    

if( $options['RMAccordion'] && $options['RMAccordion'] == 'accordion' ) :

                

    $accordion = " 



    if( \$RMjQuery( this ).closest( 'ul' ).is( '.responsive-menu' ) ) {



        \$RMjQuery( '.responsive-menu ul' ).slideUp();

        

        \$RMjQuery( '.appendLink' ).removeClass( 'rm-append-active' );

        \$RMjQuery( '.appendLink' ).html( '{$inactiveArrow}' );

            

    }



    ";



else :

        

    $accordion = null;

    

endif;



           

/*

|--------------------------------------------------------------------------

| Toggle Buttons Function

|--------------------------------------------------------------------------

|

| This is the function that deals with toggling the toggle buttons

|

*/                

                

$js .= "   

    

    \$RMjQuery( '.appendLink' ).on( 'click', function() { 



        $accordion

    

        \$RMjQuery( this ).nextAll( '#responsive-menu ul ul' ).slideToggle(); 



        \$RMjQuery( this ).html( \$RMjQuery( this ).hasClass( 'rm-append-active' ) ? '{$inactiveArrow}' : '{$activeArrow}' );

        \$RMjQuery( this ).toggleClass( 'rm-append-active' );



        $setHeight



    });

    

    \$RMjQuery( '.rm-click-disabled' ).on( 'click', function() { 



        $accordion

            

        \$RMjQuery( this ).nextAll( '#responsive-menu ul ul' ).slideToggle(); 



        \$RMjQuery( this ).siblings( '.appendLink' ).html( \$RMjQuery( this ).hasClass( 'rm-append-active' ) ? '{$inactiveArrow}' : '{$activeArrow}' );

        \$RMjQuery( this ).toggleClass( 'rm-append-active' );

        

        $setHeight



    }); 

    

";

 

/*

|--------------------------------------------------------------------------

| Menu Closing Options

|--------------------------------------------------------------------------

|

| This is where we set the menu to retract if a link is clicked

| Added 1.9

|

*/

                

if ( isset( $options['RMClickClose'] ) && $options['RMClickClose'] == 'close' ) : 



   $js .= " 

       \$RMjQuery( '#responsive-menu ul li a' ).on( 'click', function() { 



           closeRM();



       } );";



endif;



/*

|--------------------------------------------------------------------------

| Expand children links of parents

|--------------------------------------------------------------------------

|

| Section to automatically expand children links of parents if necessary

| Added 2.0

|

*/



if( $options['RMExpandPar'] ) :

            

    $js .= "



        \$RMjQuery( '#responsive-menu .current_page_ancestor.menu-item-has-children' ).children( 'ul' ).css( 'display', 'block' );

        \$RMjQuery( '#responsive-menu .current-menu-ancestor.menu-item-has-children' ).children( 'ul' ).css( 'display', 'block' );

        \$RMjQuery( '#responsive-menu .current-menu-item.menu-item-has-children' ).children( 'ul' ).css( 'display', 'block' );

        

        \$RMjQuery( '#responsive-menu .current_page_ancestor.page_item_has_children' ).children( 'ul' ).css( 'display', 'block' );

        \$RMjQuery( '#responsive-menu .current-menu-ancestor.page_item_has_children' ).children( 'ul' ).css( 'display', 'block' );

        \$RMjQuery( '#responsive-menu .current-menu-item.page_item_has_children' ).children( 'ul' ).css( 'display', 'block' );



    ";

                

endif;



/*

|--------------------------------------------------------------------------

| Close Tags

|--------------------------------------------------------------------------

|

| This closes the initial document ready call

|

*/ 

    

$js .= '}); ';



/*

|--------------------------------------------------------------------------

| Strip Tags If Needed

|--------------------------------------------------------------------------

|

| Determine whether to use the <script> tags (when using internal scripts)

|

*/       



$js .= $options['RMExternal'] ? '' : '</script>';



        

/*

|--------------------------------------------------------------------------

| Return Finished Script

|--------------------------------------------------------------------------

|

| Finally we return the final script back

|

*/   



return $js;

            

        

    }

    



}