<?php


namespace Sha_IARC_Inc;

final class Sha_Iarc_Enqueue{

    public static function registerAllScripts(){
        wp_register_script('wp_vuejs', 'https://cdn.jsdelivr.net/npm/vue', false, false);
        wp_register_script('sha_iarc_script', plugin_dir_url( __FILE__ ).'../assets/sha-iarc-code.js', 'wp_vuejs', false, true );
        wp_register_style('sha_iarc_style', plugin_dir_url( __FILE__ ).'../assets/sha-iarc-style.css');
    }

    



}

?>