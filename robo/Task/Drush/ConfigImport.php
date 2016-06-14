<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Import Drupal configuration.
 */
class ConfigImport extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('config-import')
      ->arg('sync')
      ->option('yes')
      ->run();
  }

}
