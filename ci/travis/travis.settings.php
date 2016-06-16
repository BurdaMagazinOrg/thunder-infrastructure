<?php
// settings for use with travis
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

$settings['hash_salt'] = 'asdkljhasdf023as1assds74sd';

$config_directories['sync'] = '../config/sync';

$settings['install_profile'] = 'thunder';
