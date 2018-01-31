#!/bin/bash

sql_file=sql-dump-production.sql
ip=162.243.128.146
developemnt_url=$(cat trellis/group_vars/development/wordpress_sites.yml | shyaml get-value 'wordpress_sites.codelab\.com.site_hosts.0.canonical')
staging_url=$(cat trellis/group_vars/staging/wordpress_sites.yml | shyaml get-value 'wordpress_sites.codelab\.com.site_hosts.0.canonical')

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

cd site &&
#wp @staging db reset --yes &&
#wp @staging plugin install wordpress-importer --activate &&
wp @staging db import $sql_file &&
cd ..

#wp import $sql_file &&
#wp search-replace $developemnt_url $staging_url" && cd ..



#cd /srv/www/codelab.com/current/;
#cd trellis && vagrant ssh -- -t "cd /srv/www/codelab.com/current/ && wp db export --path=/web"
#scp database.sql web@$ip:/srv/www/codelab.com/current