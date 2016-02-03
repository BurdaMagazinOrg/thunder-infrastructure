<?php

function calculate_checksum_drush_command() {

  $items['make-sha'] = array(
    'description' => "Builds an sha checksum of the parsed makefile array. Note that moving references (like -dev-branches) will always be the same as the actual origin version will not be checked.",
    'arguments' => array(
      'makefile' => 'Path of makefile to check.',
    ),
    'options' => array(
      'porcelain' => 'Print machine-readable output.'
    ),
    'drupal dependencies' => array(),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'aliases' => array('msha'),
  );


  return $items;

}

function drush_calculate_checksum_make_sha($makefile) {

  $args = func_get_args();
  if (empty($args)) {
    return drush_set_error('', dt('No makefile given.'));
  }

  $parsed = make_parse_info_file($makefile);
  unset($parsed['includes']);

  array_multisort($parsed);

  $sha = sha1(json_encode($parsed));

  $porcelain = drush_get_option('porcelain');

  if ($porcelain) {
    print($sha);
  } else {
    drush_print(sprintf('SHA1 hash of makefile %s is %s', $makefile, $sha));
  }

}