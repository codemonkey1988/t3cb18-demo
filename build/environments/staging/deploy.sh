#!/usr/bin/env bash
# Blue/Green Deployment script for staging
set -e

rsync -az --delete --delete-excluded --exclude-from=build/environments/staging/.rsyncignore ./ ${STAGING_SSH_USER}@${STAGING_SSH_HOST}:${STAGING_BASE_DIR}/cache/

ssh -T ${STAGING_SSH_USER}@${STAGING_SSH_HOST} <<_EOF_
    # pre-prepare
    set -xe
    cd ${STAGING_BASE_DIR}

    # prepare
    rm -rf releases/next
    mkdir -p releases/current
    mkdir -p releases/next
    mkdir -p logs
    rsync -a cache/ releases/next/

    # post-prepare
    ln -s ../../../shared/Data/fileadmin/ releases/next/public/fileadmin
    ln -s ../../../../../logs/ releases/next/public/typo3temp/var/logs

    # run
    rm -rf releases/previous
    mv releases/current releases/previous
    mv releases/next releases/current

    # migrate
    php71 releases/current/vendor/bin/typo3cms database:updateschema

    # post-run
    php71 releases/current/vendor/bin/typo3cms cache:flush
_EOF_