FROM php:8.1.6-cli-alpine3.15@sha256:ad4a4d0c78da5867ba5ceb00d6d4275559560fb01deabb75bb1b7e162d49e98a

COPY --from=composer:2.3.5@sha256:e47c40c669720680dd84d0bdf597621b00509d2592ca32f0ac16aa36ae6fdc46 /usr/bin/composer /usr/local/bin/composer

RUN set -e \
    && apk update --no-cache \
    && apk add --no-cache --virtual .phpize-deps \
        $PHPIZE_DEPS \
    && pecl install \
        xdebug \
    && docker-php-ext-enable \
        xdebug \
    #   Clear install
    && composer clear-cache \
    && apk del --no-network .phpize-deps \
    && docker-php-source delete \
    && rm -rf /var/cache/* \
    && rm -Rf /tmp/*

USER www-data