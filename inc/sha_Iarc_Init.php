<?php


namespace Sha_IARC_Inc;


class Sha_Iarc_Init{

    public static function getServices()
    {
        return [
            Sha_Iarc_Enqueue::class,
            Sha_Iarc_Shortcode::class
        ];
    }
    
    public static function registerServices()
    {
        foreach ( self::getServices() as $class )
        {
            $service = self::instantiate ( $class );
            if (method_exists( $service, 'register' ) ){
                $service->register();
            }
        }
    }
    
    public static function instantiate( $class )
    {
        $service = new $class();
        return $service;
    }


}



?>