<?php
/*
  Plugin Name: VW Bakery Pro Plugin
  Plugin URI: https://www.vwthemes.com/
  Description: This bakery WordPress plugin is charming, youthful, energetic, reliable and fresh looking with a feminine touch to its design which is given by the choice of bright colours and stylish fonts
  Version: 1.1
  Author: VW Themes
  Author URI: https://www.vwthemes.com/
  Text Domain: vw-bakery-pro

*/
 define( 'VW_BAKERY_PRO_EXT_FILE', __FILE__ );
 define( 'VW_BAKERY_PRO_EXT_BASE', plugin_basename( VW_BAKERY_PRO_EXT_FILE ) );
 define( 'VW_BAKERY_PRO_EXT_DIR', plugin_dir_path( VW_BAKERY_PRO_EXT_FILE ) );
 define( 'VW_BAKERY_PRO_EXT_URI', plugins_url( '/', VW_BAKERY_PRO_EXT_FILE ) );
 define( 'VW_BAKERY_PRO_EXT_VER', '1.0' );
 define( 'VW_BAKERY_PRO_EXT_TEMPLATE_DEBUG_MODE', false );
 define( 'VW_BAKERY_PRO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
 define( 'VW_BAKERY_PRO_THEME', "Sirat" );

 require_once VW_BAKERY_PRO_EXT_DIR . 'classes/plugin_settings.php';
 require_once VW_BAKERY_PRO_EXT_DIR . 'posttype/posttype.php';
 require_once VW_BAKERY_PRO_EXT_DIR . 'functions.php';
