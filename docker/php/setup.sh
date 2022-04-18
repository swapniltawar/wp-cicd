
cd /var/www/html
wp core download --allow-root
wp config create --allow-root --skip-check --dbname="onxrp" --dbuser="admin" --dbpass="admin" --dbhost=mysql --dbprefix="wp_" --extra-php="define( 'ONXRP_ENABLE_LOCAL_SETTINGS', true ); define('WP_DEBUG',true); define('WP_DEBUG_LOG',true); define('WP_DEBUG_DISPLAY',false); define('WP_ENV', 'development'); define('WP_SITEURL', 'http://onxrp.local/'); define('WP_HOME', 'http://onxrp.local/');"
wp core install --allow-root --admin_user="onxrp" --admin_email="admin@admin.com" --admin_password="admin" --url="http://onxrp.local/" --title="onxrp"

wp theme activate onxrp --allow-root
wp plugin activate --all --allow-root
wp plugin list --allow-root