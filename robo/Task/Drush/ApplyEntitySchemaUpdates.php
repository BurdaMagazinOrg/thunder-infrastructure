<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Apply entity schema updates.
 */
class ApplyEntitySchemaUpdates extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('entity-updates')
      ->option('yes')
      ->run();
  }

}
