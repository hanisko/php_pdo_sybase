# change args in docker-compose.yml
ARG PHP_VERSION

FROM php:${PHP_VERSION}-apache

RUN apt-get update && apt-get install -y \
    freetds-dev \
    freetds-bin \
    odbcinst1debian2 \
    libodbc1 \
    odbcinst \
    tdsodbc \
    unixodbc-dev \
    unixodbc && \
    rm -rf /var/lib/apt/lists/*;

RUN echo "[CustomDriver]\n\
Description = Sybase ASE ODBC Driver\n\
Driver      = /usr/lib/x86_64-linux-gnu/odbc/libtdsodbc.so" >> /etc/odbcinst.ini

RUN docker-php-ext-configure pdo_dblib --with-libdir=/lib/x86_64-linux-gnu && \
    docker-php-ext-configure pdo_odbc --with-pdo-odbc=unixODBC,/usr && \
    docker-php-ext-install pdo pdo_odbc pdo_dblib && \
    docker-php-ext-enable pdo_odbc pdo_dblib
