#!/usr/bin/env bash

#let us check first if we actually want to install oracle
if [ -z "$D_PHP_MODULE_ORACLE" ]; then
 exit 0
fi

# we need to know the php version..
if [ -z "$D_PHP_MODULE_VERSION" ]; then
 echo "PHP Version is not defined!"
 exit 0
fi

if [ "$D_PHP_MODULE_ORACLE"  != "true" ]; then
 echo "oracle installation is not enabled, skipping"
 exit 0
fi

echo "downloading php"..

DOWNLOAD_URL = ""

case "$D_PHP_MODULE_VERSION" in
    "7.1")
        DOWNLOAD_URL = "http://de2.php.net/get/php-7.1.25.tar.gz/from/this/mirror"
    ;;
    "7.2")
        DOWNLOAD_URL = "http://de2.php.net/get/php-7.2.14.tar.gz/from/this/mirror"
    ;;
    "7.3")
        DOWNLOAD_URL = "http://de2.php.net/get/php-7.3.1.tar.gz/from/this/mirror"
    ;;
    *)
     echo "unknown php version: $D_PHP_MODULE_VERSION"
     exit 1
easc

if [ -z "$DOWNLOAD_URL" ]; then
 echo "No download url definied!"
 exit 1
fi

# download the docker php-fpm build scripts
wget https://raw.githubusercontent.com/docker-library/php/master/$D_PHP_MODULE_VERSION/stretch/fpm/docker-php-entrypoint -O /usr/local/bin/docker-php-entrypoint
chmod 777 /usr/local/bin/docker-php-entrypoint

wget https://raw.githubusercontent.com/docker-library/php/master/$D_PHP_MODULE_VERSION/stretch/fpm/docker-php-source -O /usr/local/bin/docker-php-source
chmod 777 /usr/local/bin/docker-php-source

wget http://panzof.de/suc/docker-php-ext-enable -O /usr/local/bin/docker-php-ext-enable
chmod 777 /usr/local/bin/docker-php-ext-enable

wget https://raw.githubusercontent.com/docker-library/php/master/$D_PHP_MODULE_VERSION/stretch/fpm/docker-php-ext-install -O /usr/local/bin/docker-php-ext-install
chmod 777 /usr/local/bin/docker-php-ext-install

wget https://raw.githubusercontent.com/docker-library/php/master/$D_PHP_MODULE_VERSION/stretch/fpm/docker-php-ext-configure -O /usr/local/bin/docker-php-ext-configure
chmod 777 /usr/local/bin/docker-php-ext-configure

echo "scrips set...."

# Download PHP Src
mkdir -p /usr/src
cd /usr/src
wget "$DOWNLOAD_URL" -O php.tar.xz
docker-php-source extract

# check for apu
if [ $(php -m | head | grep -w 'apc') == 'apc' ];  then
    echo "apc is installed, skipping"
else
    pecl install apc
    docker-php-ext-enable apc --ini-name 20-docker-php-ext-apc.ini
fi

#check for apcu
if [ $(php -m | head | grep -w 'apcu') == 'apcu' ]; then
    echo "apcu is installed, skipping"
else
    pecl install apcu
    pecl install apcu_bc-1.0.3
    docker-php-ext-enable apcu --ini-name 10-docker-php-ext-apcu.ini
fi

if [ ! -z $(php -m | head | grep -w 'PDO_OCI') ]; then
    echo "PHP_OCI is enabled, skipping.."
else

    if [ ! -d /opt/oracle ]; then
        echo "creating oracle dir"
	    mkdir -p "/opt/oracle"
    else
	    echo "..del oracle dir"
        rm -r "/opt/oracle/"*
    fi

    cd /opt/oracle

    wget http://panzof.de/suc/instantclient-basic-linux.x64-12.2.0.1.0.zip
    wget http://panzof.de/suc/instantclient-sdk-linux.x64-12.2.0.1.0.zip
    unzip -o /opt/oracle/instantclient-basic-linux.x64-12.2.0.1.0.zip -d /opt/oracle
    unzip -o /opt/oracle/instantclient-sdk-linux.x64-12.2.0.1.0.zip -d /opt/oracle
    ln -s /opt/oracle/instantclient_12_2/libclntsh.so.12.1 /opt/oracle/instantclient_12_2/libclntsh.so
    ln -s /opt/oracle/instantclient_12_2/libclntshcore.so.12.1 /opt/oracle/instantclient_12_2/libclntshcore.so
    ln -s /opt/oracle/instantclient_12_2/libocci.so.12.1 /opt/oracle/instantclient_12_2/libocci.so
    rm -rf /opt/oracle/*.zip
    rm -rf /opt/oracle/*.zip.*	
    docker-php-ext-configure pdo_oci --with-pdo-oci="instantclient,/opt/oracle/instantclient_12_2,12.2"
    docker-php-ext-install pdo_oci
    phpenmod docker-php-ext-pdo_oci
fi

if [ ! -z $(php -m | head | grep -w 'oci8') ]; then
    echo "OCI8 is enabled, skipping.."
else
    echo 'instantclient,/opt/oracle/instantclient_12_2/' | pecl install oci8
    docker-php-ext-enable oci8
    phpenmod docker-php-ext-oci8
fi

#composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer