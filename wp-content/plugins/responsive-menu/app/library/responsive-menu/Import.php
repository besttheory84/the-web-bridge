<?php



class RM_Import {

   

     /**

     * Function to get data from imported XML file

     *

     * @return file xml

     * @added 2.2

     */

    

    static function getData( $file ) {

    

        if( !is_admin() ) exit();

        

        if( !$file['tmp_name'] )

            return RM_Status::set( 'error', __( 'No Import File Attached', 'responsive-menu' ) );

        

        if( $file['type'] != 'text/xml' )

            return RM_Status::set( 'error', __( 'Incorrect Import File Format', 'responsive-menu' ) );

        

        if( $file['size'] > 2000 )

            return RM_Status::set( 'error', __( 'Import File Too Large', 'responsive-menu' ) );

        

        if( !is_uploaded_file( $file['tmp_name'] ) )

            return RM_Status::set( 'error', __( 'Import File Not Valid', 'responsive-menu' ) );

    

        $data = file_get_contents( $file['tmp_name'] );

        

        $xml = simplexml_load_string( $data );

        $json = json_encode( $xml );

        $array = json_decode( $json, TRUE );

        

        return $array;

        

        

    }



    

}