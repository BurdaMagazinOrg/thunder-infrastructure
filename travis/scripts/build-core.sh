#!/usr/bin/env bash

MAKEFILE_HASH="$(drush msha thunder.yml --porcelain=true)"
ARTIFACTS_CORE_PATH="${HOME}/artifacts/core"
FILE_PATH="${ARTIFACTS_CORE_PATH}/${MAKEFILE_HASH}.tar.gz"

if [ ! -d $ARTIFACTS_CORE_PATH ]
  then
    mkdir -pv $ARTIFACTS_CORE_PATH
fi

if [ -f ${FILE_PATH} ]
  then
    tar -xzf "${FILE_PATH}" -C .
    phing link_custom_code
    phing create_settings
  else
    rm -v "${ARTIFACTS_CORE_PATH}/*.tar.gz"
    phing download
    tar -czf "${FILE_PATH}" docroot
    phing link_custom_code
    phing create_settings
fi
