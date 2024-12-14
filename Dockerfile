FROM php:8.2-apache

# Copy application files
COPY . /opt/lampp/htdocs/

# Configure Apache
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /opt/lampp/htdocs
RUN sed -ri -e 's!/opt/lampp/htdocs!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/opt/lampp/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set permissions
RUN chown -R www-data:www-data /opt/lampp/htdocs
RUN chmod -R 755 /opt/lampp/htdocs

EXPOSE 8013