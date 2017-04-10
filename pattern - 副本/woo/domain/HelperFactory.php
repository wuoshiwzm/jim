<?php
namespace woo\domain;

if ( ! isset( $EG_DISABLE_INCLUDES ) ) {
    require_once( "woo/mapper/VenueMapper.php" );
    require_once( "woo/mapper/SpaceMapper.php" );
    require_once( "woo/mapper/EventMapper.php" );
    require_once( "woo/mapper/Collections.php" );
}

class HelperFactory {

    //获取映射器
    static function getFinder( $type ) {
        $type = preg_replace( '|^.*\\\|', "", $type );
        $mapper = "\\woo\\mapper\\{$type}Mapper";
        if ( class_exists( $mapper ) ) {
            return new $mapper();
        }
        throw new \woo\base\AppException( "Unknown: $mapper" );
    }

    //获取集合
    static function getCollection( $type ) {

        $type = preg_replace( '|^.*\\\|', "", $type );
        $collection = "\\woo\\mapper\\{$type}Collection";
        if ( class_exists( $collection ) ) {
            return new $collection();
        }
        throw new \woo\base\AppException( "Unknown: $collection" );
    }
}
?>
