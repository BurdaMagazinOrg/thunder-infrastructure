<?php

namespace Thunder\Robo\Task\FileSystem;

use Thunder\Robo\Utility\PathResolver;

/**
 * Robo task base: Ensure private files directory.
 */
class EnsurePrivateFilesDirectory extends EnsureDirectory {

  /**
   * {@inheritdoc}
   */
  protected function getPath() {
    return PathResolver::privateFilesDirectory();
  }

}
