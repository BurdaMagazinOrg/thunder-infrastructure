<?php

namespace Thunder\Robo\Utility;

use Robo\Task\Base\Exec;

/**
 * A helper class for Drush command execution.
 */
class Drush {

  /**
   * Return Drush executable.
   *
   * @return \Robo\Task\Base\Exec
   */
  public static function exec() {
    return (new Exec(PathResolver::drush()))
      // Set working directory to docroot.
      ->dir(PathResolver::docroot());
  }

}
