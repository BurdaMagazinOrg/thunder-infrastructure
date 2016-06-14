<?php

namespace Thunder\Robo\Task\FileSystem;

use Thunder\Robo\Utility\PathResolver;

/**
 * Robo task base: Ensure public files directory.
 */
class EnsurePublicFilesDirectory extends EnsureDirectory {

  /**
   * {@inheritdoc}
   */
  protected function getPath() {
    return PathResolver::publicFilesDirectory();
  }

}
