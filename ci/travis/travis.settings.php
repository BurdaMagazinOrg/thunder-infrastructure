<?php

/**
 * @file
 * Settings for 'travis' environment.
 */

// Set temporary folder.
$config['system.file']['path.temporary'] = '../tmp';

// Set private folder.
$settings['file_private_path'] = '../private';

$databases['default']['default'] = array (
  'database' => 'drupal',
  'username' => 'root',
  'password' => '',
  'prefix' => '',
  'host' => '127.0.0.1',
  'port' => 3306,
  'namespace' => 'Drupal\Core\Database\Driver\mysql',
  'driver' => 'mysql',
);
