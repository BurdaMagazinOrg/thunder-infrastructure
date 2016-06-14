<?php

namespace Thunder\Robo\Task\FileSystem;

use Thunder\Robo\Utility\PathResolver;

/**
 * Robo task base: Ensure temporary files directory.
 */
class EnsureTemporaryFilesDirectory extends EnsureDirectory {

  /**
   * {@inheritdoc}
   */
  protected function getPath() {
    return PathResolver::temporaryFilesDirectory();
  }

}
