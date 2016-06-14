<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Enable extension.
 */
class EnableExtension extends DrushTask {

  /**
   * Extensions.
   *
   * @var array
   */
  protected $extensions;

  /**
   * Constructor.
   *
   * @param array $extensions
   *   An array of names for extensions to enable.
   */
  public function __construct(array $extensions) {
    $this->extensions = $extensions;
  }

  /**
   * {@inheritdoc}
   */
  public function run() {
    $exec = $this->exec()
      ->arg('pm-enable')
      ->option('yes');

    foreach ($this->extensions as $extension) {
      $exec->arg($extension);
    }

    return $exec->run();
  }

}
