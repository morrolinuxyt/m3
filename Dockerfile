FROM php:8.4.27-apache

# Enable mod_rewrite
RUN a2enmod rewrite \
 && echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html\n\
    <Directory /var/www/html>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride None\n\
        Require all granted\n\
        RewriteEngine On\n\
        RewriteCond %{REQUEST_FILENAME} !-d\n\
        RewriteCond %{REQUEST_FILENAME} !-f\n\
        RewriteCond %{REQUEST_FILENAME}.php -f\n\
        RewriteRule ^(.+)$ $1.php [L]\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Configurazione PHP di produzione: gli errori finiscono nel log del container,
# non in cima alla pagina. Senza un php.ini l'immagine lascia display_errors
# acceso, e un servizio esterno irraggiungibile basta a stampare Warning e
# percorsi del filesystem ai visitatori.
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
 && printf 'display_errors=Off\nlog_errors=On\nerror_log=/dev/stderr\n' \
    > "$PHP_INI_DIR/conf.d/zz-errori.ini"

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80

