<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Install Drupal site.
 */
class SiteInstall extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('site-install')
      ->arg('thunder')
      ->option('yes')
      ->option('notify')
      ->run();
  }

}
