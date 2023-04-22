FROM php:8.2-rc-fpm
WORKDIR /app
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . .
EXPOSE 8080  
CMD [ "php", "-S", "0.0.0.0:8080", "public/index.php" ]