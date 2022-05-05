FROM php:7.4-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y git unzip libpng-dev

RUN groupadd --gid 1000 docker

RUN useradd --gid 1000 --uid 1000 docker

RUN apt-get update && apt-get install -y libpng-dev


RUN apt-get install -y \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev libxpm-dev \
    libfreetype6-dev

RUN docker-php-ext-configure gd \
     --with-freetype

RUN docker-php-ext-install gd

###################### COMPOSER #######################
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
######################################################


RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

RUN \
  echo "max_file_uploads=10" >> /usr/local/etc/php/conf.d/shag.ini \
  && echo "post_max_size=20M" >> /usr/local/etc/php/conf.d/shag.ini \
  && echo "upload_max_filesize=20M" >> /usr/local/etc/php/conf.d/shag.ini \
  && echo "date.timezone=Europe/Berlin" >> /usr/local/etc/php/conf.d/1_shag.ini \
  && echo "date.timezone=Europe/Moscow" >> /usr/local/etc/php/conf.d/2_shag.ini




COPY .deploy/docker/backend/entrypoint.sh /entrypoint-component.sh

USER docker:docker

EXPOSE 9000

CMD ["/entrypoint-component.sh"]
