<?php

namespace Thunder\Robo\Task\FileSystem;

use Thunder\Robo\Utility\PathResolver;

/**
 * Robo task base: Ensure translation files directory.
 */
class EnsureTranslationFilesDirectory extends EnsureDirectory {

  /**
   * {@inheritdoc}
   */
  protected function getPath() {
    return PathResolver::translationFilesDirectory();
  }

}
