# Dump file: project.sql

This dump file is used for:

* During Travis builds (e.g. as a base for Behat tests)
* Re-installs of the site

### Initial creation

To create an inital initial dump file, install the Drupal site with the following command:

```bin/robo site:install <environment>```

See ```README.md``` in project root for more information about ```<environment>``` placeholder and the ```site:install``` Robo command as well.

The dump file, as well as all configuration YAML files, will be exported automatically after the installation process.

### Updating

As this dump is used during Travis builds, it should be updated regularly, so its data is up to date with the exported config. 

Run the following command to create a fresh install based on an existing dump file, with all updates applied:

```bin/robo dump:update <environment>```

See ```README.md``` in project root for more information about ```<environment>``` placeholder and the ```dump:update``` Robo command as well.

**!!! IMPORTANT NOTE !!!** This process drops all database tables before importing the existing dump - All data will be lost! **Back up your database before running this command.**
