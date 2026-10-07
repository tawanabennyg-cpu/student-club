# EcoTech Innovators Society — PHP Web Service
# Runs on Apache + PHP 8.2 — compatible with Render free/paid tier

FROM php:8.2-apache

# Enable Apache mod_rewrite and PDO extensions
RUN a2enmod rewrite && \
    docker-php-ext-install pdo pdo_mysql && \
    apt-get update && apt-get install -y libsqlite3-dev && \
    docker-php-ext-install pdo_sqlite && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy application source into Apache web root
COPY . /var/www/html/

# Create writable data directory for SQLite
RUN mkdir -p /var/www/html/data && \
    chown -R www-data:www-data /var/www/html/data && \
    chmod -R 755 /var/www/html/data

# Allow .htaccess overrides
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Render sets the PORT env var; Apache must listen on it
ENV PORT=10000
EXPOSE 10000

# Reconfigure Apache to listen on $PORT at container startup
CMD ["/bin/bash", "-c", "sed -i \"s/Listen 80/Listen ${PORT}/g\" /etc/apache2/ports.conf && sed -i \"s/:80>/:${PORT}>/g\" /etc/apache2/sites-enabled/000-default.conf && apache2-foreground"]
