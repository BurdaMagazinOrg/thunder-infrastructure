<?php

namespace Thunder\Robo\Task\FileSystem;

trait loadTasks {

  /**
   * Ensure private files directory.
   *
   * @return EnsurePrivateFilesDirectory
   */
  protected function taskFileSystemEnsurePrivateFilesDirectory() {
    return new EnsurePrivateFilesDirectory();
  }

  /**
   * Ensure public files directory.
   *
   * @return EnsurePublicFilesDirectory
   */
  protected function taskFileSystemEnsurePublicFilesDirectory() {
    return new EnsurePublicFilesDirectory();
  }

  /**
   * Ensure temporary files directory.
   *
   * @return EnsureTemporaryFilesDirectory
   */
  protected function taskFileSystemEnsureTemporaryFilesDirectory() {
    return new EnsureTemporaryFilesDirectory();
  }

  /**
   * Ensure translation files directory.
   *
   * @return EnsureTranslationFilesDirectory
   */
  protected function taskFileSystemEnsureTranslationFilesDirectory() {
    return new EnsureTranslationFilesDirectory();
  }

}
