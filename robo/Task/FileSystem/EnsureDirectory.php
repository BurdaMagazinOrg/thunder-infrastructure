<?php

namespace Thunder\Robo\Task\FileSystem;

use Robo\Task\BaseTask;
use Robo\Task\FileSystem\FilesystemStack;

/**
 * Robo task base: Ensure directory.
 */
abstract class EnsureDirectory extends BaseTask {

  /**
   * Return path to directory to ensure.
   *
   * @return string
   *   The directory path.
   */
  abstract protected function getPath();

  /**
   * Return mode of directory to ensure.
   *
   * @return int
   *   The (octal) mode.
   */
  protected function getMode() {
    return 0777;
  }

  /**
   * {@inheritdoc}
   */
  public function run() {
    $stack = new FilesystemStack();

    return $stack
      ->mkdir($this->getPath())
      ->chmod($this->getPath(), $this->getMode())
      ->run();
  }

}
