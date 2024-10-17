# admin-php
PROJETO BASE PARA SISTEMA ADMINISTRATIVO COM NÍVEL DE ACESSO.

# Requisitos

* PHP 8.3 ou superior
* Mysql 8.0 ou superior
* Composer 

## Como rodar o projeto baixado 

Instalar dependências
```
composer install
```


## Sequência para criar o projeto

Criar o arquivo composer.json com a instrução básica
```
composer init
```

Instalar o arquivo de log
```
composer require monolog/monolog
```


Criar o Alias para o endereço de url
Eliminar o caminho antigo 
"Franklin\\AdminPhp\\": "src/" (antigo)
"App\\": "app" (novo)

```
composer dump-autoload
```


