<?php

namespace Thunder\Robo\Task\DatabaseDump;

use Robo\Task\BaseTask;

/**
 * Robo task base: Database dump.
 */
abstract class Dump extends BaseTask {

  /**
   * Dump file path.
   *
   * @var string
   */
  protected $filepath;

  /**
   * Constructor.
   *
   * @param string $filepath
   *   The dump file path.
   */
  public function __construct($filepath) {
    $this->filepath = $filepath;
  }

}
