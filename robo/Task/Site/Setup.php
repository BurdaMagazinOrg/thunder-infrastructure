<?php

namespace Thunder\Robo\Task\Site;

use Thunder\Robo\Task\FileSystem\EnsurePrivateFilesDirectory;
use Thunder\Robo\Task\FileSystem\EnsurePublicFilesDirectory;
use Thunder\Robo\Task\FileSystem\EnsureTemporaryFilesDirectory;
use Thunder\Robo\Task\FileSystem\EnsureTranslationFilesDirectory;
use Thunder\Robo\Task\Settings\EnsureSettingsFile;
use Thunder\Robo\Utility\Environment;
use Thunder\Robo\Utility\PathResolver;
use Robo\Collection\Collection;
use Robo\Task\BaseTask;
use Robo\Task\Composer\Install;

/**
 * Robo task base: Set up site.
 */
class Setup extends BaseTask {

  /**
   * Environment.
   * 
   * @var string
   */
  protected $environment;

  /**
   * Constructor.
   *
   * @param string $environment
   *   An environment string.
   */
  public function __construct($environment) {
    $this->environment = $environment;

    // Is valid environment?
    if (!Environment::isValid($this->environment)) {
      throw new \InvalidArgumentException('Unknown environment: ' . $this->environment);
    }
  }

  /**
   * Return task collection for this task.
   *
   * @return \Robo\Collection\Collection
   *   The task collection.
   */
  public function collection() {
    $collection = new Collection();

    // Build has to be performed?
    if (Environment::needsBuild($this->environment)) {
      $collection->add([
        // Run 'composer install'.
        'Setup.composerInstall' => (new Install())->dir(PathResolver::root()),
      ]);
    }

    $collection->add([
      // Ensure private files directory.
      'Setup.ensurePrivateFilesDirectory' => new EnsurePrivateFilesDirectory(),
      // Ensure public files directory.
      'Setup.ensurePublicFilesDirectory' => new EnsurePublicFilesDirectory(),
      // Ensure temporary files directory.
      'Setup.ensureTemporaryFilesDirectory' => new EnsureTemporaryFilesDirectory(),
      // Ensure translation files directory.
      'Setup.ensureTranslationFilesDirectory' => new EnsureTranslationFilesDirectory(),
      // Ensure settings file for environment.
      'Setup.ensureSettingsFile' => new EnsureSettingsFile($this->environment),
    ]);

    return $collection;
  }

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->collection()->run();
  }

}
