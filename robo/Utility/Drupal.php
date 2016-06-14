<?php

namespace Thunder\Robo\Utility;

/**
 * A helper class for Drupal sites.
 */
class Drupal {

  /**
   * Is installed?
   *
   * @return bool
   *   Whether Drupal is already installed or not.
   *
   * @throws \Exception
   */
  public static function isInstalled() {
    static $result;

    if (!isset($json)) {
      $result = FALSE;

      // Load Drupal core status via Drush.
      $json = @json_decode(Drush::exec()
        ->arg('core-status')
        ->option('fields=bootstrap')
        ->option('format=json')
        ->printed(FALSE)
        ->run()
        ->getMessage());

      // Unable to parse Drupal core status JSON.
      if (!$json) {
        throw new \Exception('Unable to parse Drupal status.');
      }

      // Site is already installed.
      elseif (!empty($json->bootstrap) && strtolower($json->bootstrap) === 'successful') {
        $result = TRUE;
      }
    }

    return $result;
  }

}
