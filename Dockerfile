# Używamy obrazu 'php:apache' jako obrazu docelowego
FROM php:8.0-apache

# Ustawienie autora Dockerfile
LABEL maintainer="Paweł Dąbek"

# Kopiowanie skryptu PHP z lokalnego systemu plików do obrazu
COPY index.php /var/www/html/

# Expose port and cmd
EXPOSE 80

# Ustawienie healthcheck
HEALTHCHECK --interval=5m --timeout=3s \
  CMD curl -f http://localhost/ || exit 1
