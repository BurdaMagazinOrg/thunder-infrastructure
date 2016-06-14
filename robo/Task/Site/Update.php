<?php

namespace Thunder\Robo\Task\Site;

use Thunder\Robo\Task\Drush\ApplyDatabaseUpdates;
use Thunder\Robo\Task\Drush\ApplyEntitySchemaUpdates;
use Thunder\Robo\Task\Drush\CacheRebuild;
use Thunder\Robo\Task\Drush\ConfigImport;
use Thunder\Robo\Task\Drush\LocaleUpdate;
use Robo\Collection\Collection;
use Robo\Task\BaseTask;

/**
 * Robo task base: Update site.
 */
class Update extends BaseTask {

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

    $collection->add([
      // Clear all caches.
      'Update.cacheRebuild' => new CacheRebuild(),
      // Import configuration.
      'Update.drushConfigImport' => new ConfigImport(),
      // Apply database updates.
      'Update.applyDatabaseUpdates' => new ApplyDatabaseUpdates(),
      // Import configuration (again, to ensure no stale configuration updates).
      'Update.drushConfigImportAgain' => new ConfigImport(),
      // Apply entity schema updates.
      'Update.applyEntitySchemaUpdates' => new ApplyEntitySchemaUpdates(),
      // Clear all caches (again).
      'Update.cacheRebuildAgain' => new CacheRebuild(),
      // Update translations.
      'Install.localeUpdate' => new LocaleUpdate(),
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
