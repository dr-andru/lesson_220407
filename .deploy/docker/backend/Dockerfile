FROM php:7.4-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y git unzip

RUN groupadd --gid 1000 docker

RUN useradd --gid 1000 --uid 1000 docker

###################### COMPOSER #######################
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
######################################################


RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql


COPY .deploy/docker/backend/entrypoint.sh /entrypoint-component.sh

USER docker:docker

EXPOSE 9000

CMD ["/entrypoint-component.sh"]
