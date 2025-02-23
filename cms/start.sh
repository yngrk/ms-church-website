echo 'RUN: [composer install]'
composer install
echo 'RUN: [apache2-foreground]'
apache2-foreground

