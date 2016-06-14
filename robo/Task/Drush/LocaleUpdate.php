<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Update localizations.
 */
class LocaleUpdate extends DrushTask {

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->exec()
      ->arg('locale-update')
      ->run();
  }

}
