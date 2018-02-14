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
#ip=$(cat trellis/group_vars/development/wordpress_sites.yml | shyaml get-value 'wordpress_sites.codelab\.com.site_hosts.0.canonical')
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
#wp @staging db reset --yes &&
#wp @staging plugin install wordpress-importer --activate &&
wp @$env db import $sql_file &&
cd ..

#wp import $sql_file &&
#
# Replace database URL's
cd site &&
echo $development_url
echo $production_url
wp @$env search-replace $development_url $production_url && cd ..



#cd /srv/www/codelab.com/current/;
#cd trellis && vagrant ssh -- -t "cd /srv/www/codelab.com/current/ && wp db export --path=/web"
#scp database.sql web@$ip:/srv/www/codelab.com/current