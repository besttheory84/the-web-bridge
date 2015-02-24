<?php



class RM_Input {

    

  

    /**

     * Function to get all Input values

     *

     * @param string $name

     * @return array

     * @added 2.0

     */

    

    static function all( $name = null ) {

        

        

        $arrays = array_merge( $_POST, $_GET );

        

        return $name ? $arrays[$name] : $arrays;

        

        

    }

    

        

    /**

     * Function to get only post values

     *

     * @param  string  $name

     * @return array

     * @added 2.0

     */

    

    static function post( $name = null ) {   

        

        if( $name ) 

            return $name && isset( $_POST[$name] ) ? $_POST[$name] : false;

        else

            return $_POST;

        

        

    }

    

    /**

     * Function to get only get values

     *

     * @param  string  $name

     * @return array

     * @added 2.0

     */

    

    static function get( $name = null ) {

        

        

        if( $name ) 

            return $name && isset( $_GET[$name] ) ? $_GET[$name] : false;

        else

            return $_GET;

        

        

    }

    

    /**

     * Function to get only file values

     *

     * @param  string  $name

     * @return array

     * @added 2.0 

     */

    

    static function file( $name = null ) {

        

        

        if( $name ) 

            return $name && isset( $_FILES[$name] ) ? $_FILES[$name] : false;

        else

            return $_FILES;

        

        

    }

   

    

}