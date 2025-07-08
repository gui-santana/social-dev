#!/bin/sh

# Roda as migrações do banco de dados. A flag --force é necessária em produção.
php artisan migrate --force

# Inicia o servidor web Apache em primeiro plano.
apache2-foreground