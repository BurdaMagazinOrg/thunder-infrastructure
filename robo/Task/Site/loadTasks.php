<?php

namespace Thunder\Robo\Task\Site;

trait loadTasks {

  /**
   * Install site.
   *
   * @param string $environment
   *   An environment string.
   *
   * @return Install
   */
  protected function taskSiteInstall($environment) {
    return new Install($environment);
  }

  /**
   * Set up site.
   *
   * @param string $environment
   *   An environment string.
   *
   * @return SiteSetup
   */
  protected function taskSiteSetup($environment) {
    return new Setup($environment);
  }

  /**
   * Update site.
   *
   * @param string $environment
   *   An environment string.
   *
   * @return Install
   */
  protected function taskSiteUpdate($environment) {
    return new Update($environment);
  }

}
