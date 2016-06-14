<?php

namespace Thunder\Robo\Task\DatabaseDump;

trait loadTasks {

  /**
   * Export project database dump.
   *
   * @param string $filepath
   *   The file path of the database dump.
   *
   * @return Export
   */
  protected function taskDatabaseDumpExport($filepath) {
    return new Export($filepath);
  }

  /**
   * Import project database dump.
   * 
   * @param string $filepath
   *   The file path of the database dump.
   *
   * @return Export
   */
  protected function taskDatabaseDumpImport($filepath) {
    return new Import($filepath);
  }

}
