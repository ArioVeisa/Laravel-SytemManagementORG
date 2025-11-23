#!/bin/sh

# 1. Benerin Root Folder ke /public
sed -i 's|root /home/site/wwwroot;|root /home/site/wwwroot/public;|g' /etc/nginx/sites-available/default

# 2. Benerin Routing Laravel
sed -i 's|index  index.php index.html index.htm hostingstart.html;|index  index.php index.html index.htm hostingstart.html; try_files $uri $uri/ /index.php?$query_string;|g' /etc/nginx/sites-available/default

# 3. Reload Nginx
service nginx reload

# 4. Jalanin PHP-FPM (WAJIB DI PALING BAWAH)
php-fpm