<?php

namespace Thunder\Robo\Task\Site;

use Thunder\Robo\Task\DatabaseDump\Export;
use Thunder\Robo\Task\DatabaseDump\Import;
use Thunder\Robo\Task\Drush\CacheRebuild;
use Thunder\Robo\Task\Drush\ConfigExport;
use Thunder\Robo\Task\Drush\EnableExtension;
use Thunder\Robo\Task\Drush\LocaleUpdate;
use Thunder\Robo\Task\Drush\SiteInstall;
use Thunder\Robo\Task\Drush\SqlDrop;
use Thunder\Robo\Task\Drush\UserLogin;
use Thunder\Robo\Utility\PathResolver;
use Robo\Collection\Collection;
use Robo\Task\BaseTask;

/**
 * Robo task base: Install site.
 */
class Install extends BaseTask {

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
  }

  /**
   * Return task collection for this task.
   *
   * @return \Robo\Collection\Collection
   *   The task collection.
   */
  public function collection() {
    $collection = new Collection();
    $dump = PathResolver::databaseDump();

    // No database dump file present -> perform initial installation, export
    // configuration and create database dump file.
    if (!file_exists($dump)) {
      $collection->add([
        // Install Drupal site.
        'Install.siteInstall' => new SiteInstall(),
        // Ensure 'config' and 'locale' module.
        'Install.enableExtensions' => new EnableExtension(['config', 'locale']),
        // Update translations.
        'Install.localeUpdate' => new LocaleUpdate(),
        // Rebuild caches.
        'Install.cacheRebuild' => new CacheRebuild(),
        // Export configuration.
        'Install.configExport' => new ConfigExport(),
        // Export database dump file.
        'Install.databaseDumpExport' => new Export($dump),
      ]);
    }

    // Database dump file already exists -> import it and update database with
    // latest exported configuration (if any).
    else {
      $collection->add([
        // Drop all tables.
        'Install.sqlDrop' => new SqlDrop(),
        // Import database dump.
        'Install.databaseDumpImport' => new Import($dump)
      ]);

      // Perform site update tasks
      $update = new Update($this->environment);
      $collection->add($update->collection());

      // Display login URL.
      $collection->add([
        'Install.userLogin' => new UserLogin(),
      ]);
    }

    return $collection;
  }

  /**
   * {@inheritdoc}
   */
  public function run() {
    return $this->collection()->run();
  }

}
