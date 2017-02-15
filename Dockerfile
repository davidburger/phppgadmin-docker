FROM php:5.6-apache

RUN apt-get update && apt-get -y install wget \
    && echo "deb http://apt.postgresql.org/pub/repos/apt/ jessie-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | \
      apt-key add - \
    && apt-get update && apt-get install -y libpq-dev postgresql-client unzip \
    && docker-php-ext-install pgsql pdo_pgsql

#COPY pga/ /var/www/html/
COPY php.ini /usr/local/etc/php/

RUN cd /tmp \
    && wget https://github.com/phppgadmin/phppgadmin/archive/master.zip \
    && unzip master.zip \
    && cp -R phppgadmin-master/* /var/www/html/ \
    && rm -rf master.zip phppgadmin-master

COPY conf/*.inc.php /var/www/html/conf/

#reduce image size
RUN apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false wget unzip
RUN apt-get autoremove -y
RUN apt-get clean
RUN apt-get autoclean
RUN rm -r /var/lib/apt/lists/*
