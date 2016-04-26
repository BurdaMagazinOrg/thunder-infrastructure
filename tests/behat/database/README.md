# Travis dump
This dump is used for behat tests it is created by doing the following steps

    drush si thunder --account-name=admin --account-pass=admin --site-mail=admin@example.com --yes
    drush cset system.site uuid e82688a5-5373-4188-9c00-c663b3ee0c04 --yes
    drush config-import -y 
    drush updb -y
    drush config-import -y 
    drush locale-update
    drush cr
    drush sql-dump --ordered-dump --structure-tables-list=cache_data,cache_bootstrap,cache_container,cache_config,cache_default,cache_discovery,cache_dynamic_page_cache,cache_entity,cache_menu,cache_migrate,cache_render,cache_toolbar,cachetags,watchdog,sessions > behat-instyle.sql

To keep it up to date it should not be neccessary to recreate all this steps, just do the following after taking a backup of your database:

    drush sql-drop # don't forget to backup first!
    drush sqlc < travis.sql
    drush config-import -y
    drush updb -y
    drush config-import -y # make sure nothing needs to be imported at this step
    drush locale-update
    drush cr
    drush sql-dump --ordered-dump --structure-tables-list=cache_data,cache_bootstrap,cache_container,cache_config,cache_default,cache_discovery,cache_dynamic_page_cache,cache_entity,cache_menu,cache_migrate,cache_render,cache_toolbar,cachetags,watchdog,sessions > behat-instyle.sql

