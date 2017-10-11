FROM php:7.1.9-fpm

ADD php.ini /usr/local/etc/php/conf.d/php.ini

RUN apt-get update \
  && docker-php-ext-install pdo_mysql mysqli mbstring

RUN apt-get update \
  && apt-get install -y libmemcached-dev zlib1g-dev unzip git \
  && pecl install memcached-3.0.3 \
  && docker-php-ext-enable memcached opcache

# https://qiita.com/niisan-tokyo/items/8cccec88d45f38171c94
RUN php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php ;\
  php composer-setup.php --filename=composer;\
  php -r "unlink('composer-setup.php');" ;\
  mv composer /usr/local/bin/composer