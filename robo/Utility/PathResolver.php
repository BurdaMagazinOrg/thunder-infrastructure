<?php

namespace Thunder\Robo\Utility;

/**
 * A helper class for path resolving.
 */
class PathResolver {

  /**
   * Return path exported configration.
   *
   * @return string
   *   The path to the exported Drupal configuration files.
   */
  public static function config() {
    return static::root() . '/config/sync';
  }

  /**
   * Return database dump path.
   *
   * @return string
   *   The path to the 'project.sql' database dump file.
   */
  public static function databaseDump() {
    return static::root() . '/database/project.sql';
  }

  /**
   * Return docroot path.
   *
   * @return string
   *   The path to the Drupal docroot.
   */
  public static function docroot() {
    return static::root() . '/docroot';
  }

  /**
   * Return Drush binary path.
   *
   * @return string
   *   The path to the Drush binary.
   */
  public static function drush() {
    return static::root() . '/vendor/drush/drush/drush';
  }

  /**
   * Initialize path resolver.
   *
   * @param string $root
   *   The root path to use.
   */
  public static function init($root) {
    static::rootCache($root);
  }

  /**
   * Return root path.
   *
   * @return string
   *   The path to the project root.
   */
  public static function root() {
    return static::rootCache();
  }

  /**
   * Cache root path in global variable.
   *
   * @param null|string $root
   *   The root path to cache.
   *
   * @return string
   *   The cached root path.
   *
   * @throws \Exception
   */
  protected static function rootCache($root = NULL) {
    $cid = '__THUNDER_ROBO_ROOT__';

    if (isset($root) && !empty($root)) {
      if (isset($GLOBALS[$cid]) && !empty($GLOBALS[$cid])) {
        throw new \Exception('PathResolver has already been initialized.');
      }

      $GLOBALS[$cid] = $root;
    }

    if (!isset($GLOBALS[$cid]) || empty($GLOBALS[$cid])) {
      throw new \Exception('PathResolver is not initialized.');
    }

    return $GLOBALS[$cid];
  }

  /**
   * Return private files directory path.
   *
   * @return string
   *   The path to the private files directory of Drupal.
   */
  public static function privateFilesDirectory() {
    return static::root() . '/private';
  }

  /**
   * Return public files directory path.
   *
   * @return string
   *   The path to the public files directory of Drupal.
   */
  public static function publicFilesDirectory() {
    return static::siteDirectory() . '/files';
  }

  /**
   * Return site directory path.
   *
   * @return string
   *   The path to the site directory of Drupal.
   */
  public static function siteDirectory() {
    return static::docroot() . '/sites/default';
  }

  /**
   * Return temporary files directory path.
   *
   * @return string
   *   The path to the temporary files directory of Drupal.
   */
  public static function temporaryFilesDirectory() {
    return static::root() . '/tmp';
  }

  /**
   * Return translation files directory path.
   *
   * @return string
   *   The path to the translation files directory of Drupal.
   */
  public static function translationFilesDirectory() {
    return static::publicFilesDirectory() . '/translations';
  }

}
