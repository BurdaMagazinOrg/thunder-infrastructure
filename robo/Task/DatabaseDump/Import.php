<?php

namespace Thunder\Robo\Task\DatabaseDump;

use Thunder\Robo\Utility\Drush;

/**
 * Robo task: Import database dump.
 */
class Import extends Dump {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return Drush::exec()
      ->arg('sql-cli')
      ->arg('< ' . $this->filepath)
      ->run();
  }

}
