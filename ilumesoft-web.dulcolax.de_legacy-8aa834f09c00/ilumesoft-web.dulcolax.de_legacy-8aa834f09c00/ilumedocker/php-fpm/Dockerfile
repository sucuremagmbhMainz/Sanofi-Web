ARG FPM_IMAGE=phpdockerio/php71-fpm:latest
FROM $FPM_IMAGE
WORKDIR "/application"

ARG PHP_MODULE_VERSION="7.1"
ARG PHP_MODULE_ORACLE="false"
ARG PHP_MODULE_OTHER_PACKAGES=""

ENV D_PHP_MODULE_VERSION=$PHP_MODULE_VERSION
ENV D_PHP_MODULE_ORACLE=$PHP_MODULE_ORACLE


# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install PHP extensions deps
# your php modules here
RUN apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg-turbo8-dev \
        libmcrypt-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
        unixodbc-dev \
        libxml2-dev \
        libaio-dev \
        libmemcached-dev \
        freetds-dev \
        libssl-dev \
        openssl \
        php-pear \
        php7.1-dev \
        apt-utils \
        build-essential \
        wget \
        vim \
        git \
        nano \
        unzip \
        php-xdebug $PHP_MODULE_OTHER_PACKAGES php-memcached php$PHP_MODULE_VERSION-mysql php$PHP_MODULE_VERSION-bz2 php$PHP_MODULE_VERSION-gd php$PHP_MODULE_VERSION-intl php$PHP_MODULE_VERSION-phpdbg php$PHP_MODULE_VERSION-ssh2 php$PHP_MODULE_VERSION-yaml mysql-client \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

#COPY oracle.sh /
#RUN bash /oracle.sh
#ENV LD_LIBRARY_PATH "/oracle/instantclient_12_2/:$LD_LIBRARY_PATH"
#RUN rm /oracle.sh

RUN echo "the following modules are now available"
RUN php -m 

#RUN echo 'xdebug.remote_port=9000' >> /usr/local/etc/php/php.ini
#RUN echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/php.ini
#RUN echo 'xdebug.remote_connect_back=1' >> /usr/local/etc/php/php.ini