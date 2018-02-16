#!/bin/bash

ip=162.243.151.169
env=production

sql_file=sql-dump-production.sql
development_url=$(cat trellis/group_vars/development/wordpress_sites.yml | shyaml get-value 'wordpress_sites.codelab\.com.site_hosts.0.canonical')
staging_url=$(cat trellis/group_vars/staging/wordpress_sites.yml | shyaml get-value 'wordpress_sites.codelab\.com.site_hosts.0.canonical')
production_url=$(cat trellis/group_vars/production/wordpress_sites.yml | shyaml get-value 'wordpress_sites.codelab\.com.site_hosts.0.canonical')

#
# Get Development canonical URL
#
cd site && wp @dev db export $sql_file && cd ..

#
# Copy dumped database to remote
#
# remove strict host checking
#
cd trellis && ssh vagrant@codelab.test "cd /srv/www/codelab.com/current &&
scp -o StrictHostKeyChecking=no $sql_file web@$ip:/srv/www/codelab.com/current &&
rm $sql_file" && cd ..

#
# Import remote SQL file to remote database
#
cd site &&
wp @$env db import $sql_file

#
# Replace database URL's
#
wp @$env search-replace --all-tables $development_url $production_url

#
# Disable cache plugin
#
wp @$env plugin activate w3-total-cache
