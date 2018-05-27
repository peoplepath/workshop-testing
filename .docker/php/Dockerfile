FROM php:7.2-cli-alpine

MAINTAINER Zdeněk Zahoř <zdenek.zahor@gmail.com>

# Parametry uživatele "Developer"
ARG HOST_USER_GID
ARG HOST_USER_UID
ARG USER_LOGIN=developer

RUN \
    apk update && \
    # Přidání uživatele "Developer"
    apk add --no-cache shadow && \
    groupadd --gid $HOST_USER_GID $USER_LOGIN && \
    useradd --uid $HOST_USER_UID --gid $HOST_USER_GID $USER_LOGIN --comment "Developer" --create-home && \
    # Xdebug
    apk add --no-cache --virtual .build-deps--xdebug autoconf g++ make && \
    pecl install xdebug && \
    apk del .build-deps--xdebug && \
    docker-php-ext-enable xdebug && \
    # Composer
    curl --silent --location https://raw.githubusercontent.com/composer/getcomposer.org/master/web/installer | php -- --install-dir=/usr/local/bin --filename=composer
