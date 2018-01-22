# E-commerce

> Projeto e-commerce api

# Instalação do projeto

## Requisitos

* PHP >= 7.0.0
* Composer >= v1.5
* MySQL >= 5.7.*

## Extensões PHP

* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* php ext-libsodium
* php ext-gmp

## Comandos para instalação

No diretório da aplicação digite os comandos abaixo

``` bash
# instalar as dependencias
composer install

# configurar o .env "Já configurado com as definições do docker-compose.yml"
cp .env.example .env

# gerar as tabelas e dados iniciais
php artisan migrate --seed

```

# Docker

Subir a aplicação com o Docker

## Requisitos

* Dcoker >= 17
* docker-compose >= 1

## Comandos para instalação com docker

A aplicação será iniciada na porta :9000 caso haja a necessidade de trocar a porta alterar o arquivo docker-compose.yml

``` bash
# inicia a aplicação com as configurações definidas no docker-compose.yml
docker-compose up -d
```

Após rodar o *docker-compose up -d* acesse o container e execute os *Comandos para instalação*

``` bash
# acessar o container
docker exec -it ecommerce-mobly-api /bin/bash
```
