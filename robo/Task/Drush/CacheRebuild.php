<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Rebuild caches.
 */
class CacheRebuild extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('cache-rebuild')
      ->run();
  }

}
