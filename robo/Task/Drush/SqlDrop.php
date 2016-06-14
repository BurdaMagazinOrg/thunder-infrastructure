<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Drop all database tables.
 */
class SqlDrop extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('sql-drop')
      ->option('yes')
      ->run();
  }

}
