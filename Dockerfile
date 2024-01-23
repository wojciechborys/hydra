FROM wordpress:latest

# Skopiuj zawartość motywu Sage do folderu /var/www/html/wp-content/themes
COPY ./ /var/www/html/wp-content/themes/sage

# Przełącz się do folderu głównego WordPress
WORKDIR /var/www/html

# Uruchom serwer WordPress
CMD ["apache2-foreground"]