<?php

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/events-teaser' );
    require_once( __DIR__ . '/events-teaser/events-teaser-block.acf.php' );

    register_block_type( __DIR__ . '/insights-teaser' );
    require_once( __DIR__ . '/insights-teaser/insights-teaser-block.acf.php' );

    register_block_type( __DIR__ . '/partner-grid' );
    require_once( __DIR__ . '/partner-grid/partner-grid-block.acf.php' );

    register_block_type( __DIR__ . '/hero' );
    require_once( __DIR__ . '/hero/hero.acf.php' );

    register_block_type( __DIR__ . '/program' );
    require_once( __DIR__ . '/program/program.acf.php' );

    register_block_type( __DIR__ . '/boxes' );
    require_once( __DIR__ . '/boxes/boxes.acf.php' );
}

