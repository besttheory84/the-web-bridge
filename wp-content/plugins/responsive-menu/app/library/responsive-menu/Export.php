<?php



class RM_Export {

    

  

    /**

     * Function to create export XML file

     *

     * @return file xml

     * @added 2.2

     */

    

    static function export() {

        

        if( !is_admin() ) exit();

        

        $fileName = RM_Registry::get( 'config', 'plugin_base_dir' ) . '/public/export/export.xml';

        

        $file = fopen( $fileName, 'w+' );

        

        if( !$file ) :

            

            return RM_Status::set( 'error', __( 'Could not create export file, please check plugin folder permissions', 'responsive-menu' ) );

            

        endif;



        $xml = '<?xml version="1.0" encoding="UTF-8"?>';

        $xml .= '<RMOptions>';

        

        foreach( ResponsiveMenu::getOptions() as $option_key => $option_val ) :

            

            $xml .= '<' . $option_key . '>' . $option_val . '</' . $option_key . '>';

                

        endforeach;

        

        $xml .= '</RMOptions>';

        

        fwrite( $file, $xml );

        fclose( $file );

        

        $link = RM_Registry::get( 'config', 'plugin_base_uri' ) . 'public/export/export.xml';

        

        RM_Status::set( 'updated', '<a href="' . $link . '">' . __( 'You can download your exported file by clicking here', 'responsive-menu' ) . '</a>' );

        

        

    }

    

    

}