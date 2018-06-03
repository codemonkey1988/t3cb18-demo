#!/usr/bin/env bash
# Blue/Green Deployment script for staging
set -e

rsync -az --delete --delete-excluded --exclude-from=build/environments/staging/.rsyncignore ./ ${STAGING_SSH_USER}@${STAGING_SSH_HOST}:${STAGING_BASE_DIR}/cache/

ssh -T ${STAGING_SSH_USER}@${STAGING_SSH_HOST} <<_EOF_
    # pre-prepare
    set -xe
    cd ${STAGING_BASE_DIR}

    release_name=$(date +%s)

    # prepare
    rm -rf releases/$release_name
    mkdir -p logs
    rsync -a cache/ releases/$release_name/

    # post-prepare
    ln -s ../../../shared/Data/fileadmin/ releases/$release_name/public/fileadmin
    ln -s ../../../../../logs/ releases/$release_name/public/typo3temp/var/logs

    # run
    ln -sfn releases/$release_name/ releases/current

    # migrate
    php71 releases/current/vendor/bin/typo3cms database:updateschema

    # post-run
    php71 releases/current/vendor/bin/typo3cms cache:flush

    # cleanup

_EOF_