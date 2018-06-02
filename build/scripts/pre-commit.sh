#!/usr/bin/env bash
PATH=$PATH:/usr/local/bin:/usr/local/sbin

######################
# Check php codestyle
######################

ddev exec /var/www/html/vendor/bin/php-cs-fixer fix --config /var/www/html/build/.php_cs --dry-run --diff --diff-format udiff
ERROR_CODE=$?

if [ ${ERROR_CODE} -ne 0 ];then
      echo -e "\n-----------------------------------------------------------------\n"
      echo -e "  >> ERROR: There was a coding guideline problem in one or more of  "
      echo -e "              your php files.                                       "
      echo -e "------------------------------------------------------------------\n"
      echo -e "   Your commit is being aborted ... Fix and try again!              "
      exit 1
fi

exit 0