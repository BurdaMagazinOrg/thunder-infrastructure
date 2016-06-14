<?php

namespace Thunder\Robo\Task\Settings;

trait loadTasks {

  /**
   * Ensure settings file for local environments.
   *
   * @param string $environment
   *   An environment string.
   *
   * @return EnsureSettingsFile
   */
  protected function taskSettingsEnsureSettingsFile($environment) {
    return new EnsureSettingsFile($environment);
  }

}
