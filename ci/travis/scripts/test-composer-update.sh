#!/usr/bin/env bash
#
# Check composer update for site on Travis CI
#
# This script should be executed after site is installed. Basically before default
# tests that are executed.

# If it's not cron execution script can be finished.
if [[ ${TRAVIS_EVENT_TYPE} != "cron" ]]; then
  echo 'Skip composer update test.'

  exit 0
fi

# Starting with update testing process.
echo 'Executing composer update test.'

# Package is required globally, because we don't want to interfere with project
# composer file and project Robo scripts. Also project directory could be used
# later for deployment and there should not be any interference between it and
# update testing script.
composer global require "burdamagazinorg/update-tester:~1.0"

# Robo has to be available globally for proper execution of Robo scripts. That's
# why composer bin path has to be set in $PATH and it has to be first in path
# discovery, since it could be that project bin path with Robo is already set.
# $PATH variable will be set only in this script to defined value.
export PATH="$HOME/.composer/vendor/bin:$PATH"

# Execute testing of composer update on build directory. Clone directory will be
# created next to Travis CI build directory.
update-tester.php test:update ${TRAVIS_BUILD_DIR} ${TRAVIS_BUILD_DIR}-clone
