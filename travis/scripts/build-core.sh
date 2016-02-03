#!/usr/bin/env bash

MAKEFILE_HASH="$(drush msha thunder.yml --porcelain=true)"
FILE_PATH="${HOME}/articfacts/${MAKEFILE_HASH}.tar.gz"

echo ${FILE_PATH}

if [ ! -d ~/articfacts ]
  then
    mkdir ~/articfacts
fi

if [ -f ${FILE_PATH} ]
  then
    tar -xzf "${FILE_PATH}" -C .
    phing link_custom_code
    phing create_settings


  else
    phing download
    tar -czf "${FILE_PATH}" docroot
    phing link_custom_code
    phing create_settings
fi
