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
cd site && wp @production db export $sql_file && cd ..

#
# Copy dumped database to remote
#
# remove strict host checking
#
ssh vagrant@codelab.test "cd /srv/www/codelab.com/current &&
scp -o StrictHostKeyChecking=no web@$ip:/srv/www/codelab.com/current/$sql_file $sql_file"

#
# Remove remote file
#
ssh web@$ip "rm /srv/www/codelab.com/current/$sql_file"

#
# Import remote SQL file to development database
#
cd site &&
wp @dev db import $sql_file

#
# Replace database URL's
#
wp @dev search-replace --all-tables $production_url $development_url

#
# Disable cache plugin
#
wp @dev plugin deactivate w3-total-cache
