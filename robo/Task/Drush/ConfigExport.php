<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Export Drupal configuration.
 */
class ConfigExport extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('config-export')
      ->arg('sync')
      ->option('yes')
      ->run();
  }

}
