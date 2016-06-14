<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Apply database updates.
 */
class ApplyDatabaseUpdates extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('updatedb')
      ->option('yes')
      ->run();
  }

}
