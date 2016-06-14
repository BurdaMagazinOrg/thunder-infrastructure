<?php

namespace Thunder\Robo\Task\Drush;

use Thunder\Robo\Utility\Drush;
use Robo\Task\BaseTask;

/**
 * Robo task base: Drush.
 */
abstract class DrushTask extends BaseTask {

  /**
   * Return Drush executable.
   *
   * @return \Robo\Task\Base\Exec
   */
  protected function exec() {
    return Drush::exec();
  }

}
