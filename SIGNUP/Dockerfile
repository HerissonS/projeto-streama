FROM php:apache

# Instalando a extensão LDAP
RUN apt-get update && apt-get install -y libldap2-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
    docker-php-ext-install ldap

# Copie os arquivos do seu projeto para o diretório padrão do Apache
COPY . /var/www/html/