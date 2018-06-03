#!/usr/bin/env bash
# Blue/Green Deployment script for staging
set -e

rsync -az --delete --delete-excluded --exclude-from=build/environments/staging/.rsyncignore ./ ${STAGING_SSH_USER}@${STAGING_SSH_HOST}:${STAGING_BASE_DIR}/cache/

TIMESTAMP=$(date +%s)

ssh -T ${STAGING_SSH_USER}@${STAGING_SSH_HOST} <<_EOF_
    # pre-prepare
    set -xe
    cd ${STAGING_BASE_DIR}

    # prepare
    mkdir -p releases/{TIMESTAMP}/
    mkdir -p logs
    rsync -a cache/ releases/${TIMESTAMP}/

    # post-prepare
    ln -s ../../../shared/Data/fileadmin/ releases/${TIMESTAMP}/public/fileadmin
    ln -s ../../../../../logs/ releases/${TIMESTAMP}/public/typo3temp/var/logs

    # run
    ln -sfn releases/${TIMESTAMP}/ releases/current

    # migrate
    php71 releases/${TIMESTAMP}/vendor/bin/typo3cms database:updateschema

    # post-run
    php71 releases/${TIMESTAMP}/vendor/bin/typo3cms cache:flush

    # cleanup

_EOF_