<?php

/**
 * PHPUnit tests bootstrap.
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner;

$loader = require __DIR__ . '/../../../vendor/autoload.php';
$loader->addPsr4( 'WP_Plugin_Uninstall_Scanner\PHPUnit\\', __DIR__ );

// EOF
