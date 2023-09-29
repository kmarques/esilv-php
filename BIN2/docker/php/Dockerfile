# Create a php image with the required extensions such as pdo, pdo_mysql, gd, zip, etc.

FROM php:fpm-alpine

# persistent / runtime deps
RUN apk add --no-cache \
    acl \
    fcgi \
    file \
    gettext \
    git \
    ;

RUN set -eux; \
    apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    icu-data-full \
    icu-dev \
    libzip-dev \
    zlib-dev \
    ; \
    \
    docker-php-ext-configure zip; \
    docker-php-ext-install -j$(nproc) \
    intl \
    zip \
    ; \
    pecl install \
    apcu \
    ; \
    pecl clear-cache; \
    docker-php-ext-enable \
    apcu \
    opcache \
    ; \
    \
    runDeps="$( \
    scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
    | tr ',' '\n' \
    | sort -u \
    | awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    )"; \
    apk add --no-cache --virtual .app-phpexts-rundeps $runDeps; \
    \
    apk del .build-deps

# Install MySQL PDO
RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql

COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]

CMD ["php-fpm"]

# copy sources
COPY ./mon-site /var/www/html/

RUN rm -Rf docker/