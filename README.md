# Crud com Laravel 10

## Passo a passo da instalação

### Baixe o laravel com o comando 
curl -s "https://laravel.build/laravel10-crud" | bash

Após a instalação dentro da pasta do projeto criar o arquivo .env

Atualize as variáveis de ambiente do arquivo .env
```
APP_NAME=LaravelCrud
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

#Especificaçoes do docker-compose.yml
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=crud
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

Após concluir a configuração do arquivo .env, dentro da pasta do projeto criar duas pastas: nginx e php

### Na pasta nginx
criar o arquivo laravel.conf com as seguintes info.
````
server {
    listen 80;
    index index.php;
    root /var/www/public;

    client_max_body_size 51g;
    client_body_buffer_size 512k;
    client_body_in_file_only clean;

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass laravel-crud:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
        gzip_static on;
    }

    error_log  /var/log/nginx/error.log;
    access_log /var/log/nginx/access.log;
}
````
### Na pasta php
criar o arquivo custom.ini com as seguitens info.

````
[PHP]
post_max_size = 100M
upload_max_filesize = 100M
````

#### Criar o arquivo docker-compose.yml

Na pasta raiz do projeto criar o arquivo docker-compose.yml
adicionar as informações:

````
version: "3.7"

services:
    laravel-crud:
        build:
            context: .
            dockerfile: Dockerfile
        restart: unless-stopped
        working_dir: /var/www/
        volumes:
            - ./:/var/www
        networks:
            - my-network
    # nginx
    nginx:
        container_name: servidor-nginx
        image: nginx:alpine
        restart: unless-stopped
        ports:
            - "80:80"
        volumes:
            - ./:/var/www
            - ./docker/nginx/:/etc/nginx/conf.d/
        networks:
            - my-network
     # db mysql ${DB_DATABASE} //Busca do arquivo .env
    mysql:
        container_name: banco-mysql
        image: mysql:5.7.22
        restart: unless-stopped
        environment:
            MYSQL_DATABASE: ${DB_DATABASE}
            MYSQL_ROOT_PASSWORD: ${DB_PASSWORD}
            MYSQL_PASSWORD: ${DB_PASSWORD}
            MYSQL_USER: ${DB_USERNAME}
        volumes:
            - ./.docker/mysql/dbdata:/var/lib/mysql
        ports:
            - "3306:3306"
        networks:
            - my-network    

networks:
    my-network:
        driver: bridge

````

### Dockerfile
por final vamos criar o arquivo dockerfile com as informações:
````
FROM php:8.1-fpm

# Arguments
ARG user=projetoroot
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user
````


Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container app
```sh
docker-compose exec laravel-crud bash
```

Instale as dependências do projeto
```sh
composer install
``


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost](http://localhost)
