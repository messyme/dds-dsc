# Define Base Image
FROM telkomindonesia/debian-buster:php-7.2-apm-apache-novol
MAINTAINER Dimas Restu Hidayanto <dimas@playcourt.id>

# Set Working Directory Under Repository Directory
WORKDIR /var/www/html

# Copy all file inside repository to Working Directory
COPY . .

USER root

RUN composer install

USER user
