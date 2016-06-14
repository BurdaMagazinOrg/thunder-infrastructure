<?php

namespace Thunder\Robo\Utility;

/**
 * A helper class for environments.
 */
class Environment {

  /**
   * Environment: local.
   */
  const LOCAL = 'local';

  /**
   * Environment: travis.
   */
  const TRAVIS = 'travis';

  /**
   * Is valid environment?
   *
   * @param string $environment
   *   An environment string.
   *
   * @return bool
   *   Whether the environment is valid or not.
   */
  public static function isValid($environment) {
    return $environment === static::LOCAL || file_exists(PathResolver::siteDirectory() . '/settings.' . $environment . '.php');
  }

  /**
   * Needs building?
   *
   * @param $environment
   *   An environment string.
   *
   * @return bool
   *   Whether the environment has to perform builds (e.g. run 'composer install').
   */
  public static function needsBuild($environment) {
    return static::isValid($environment) && in_array($environment, [
      static::LOCAL,
      static::TRAVIS,
    ]);
  }

}
