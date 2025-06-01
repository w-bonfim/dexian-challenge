# dexian-challenge

API RESTful para gerenciamento de pedidos em uma pastelaria.

## Requisitos

- PHP >= 8.2
- Composer

## Clonar o repositório**
   git clone https://github.com/w-bonfim/dexian-challenge.git
   cd dexian-challenge

## Instalar as dependências

composer install

## Configuração do ambiente
- cp .env.example .env
  
## Configure o acesso ao banco de dados no arquivo .env:

  -DB_CONNECTION=mysql
  -DB_HOST=127.0.0.1
  -DB_PORT=3306
  -DB_DATABASE=nome_do_seu_banco
  -DB_USERNAME=seu_usuario
  -DB_PASSWORD=sua_senha
   
## Executar as migrations e seeds

-php artisan migrate

## Se desejar, também pode-se popular o banco de dados com dados de exemplo (opcional):

-php artisan db:seed

## Iniciar o servidor de desenvolvimento
   
-php artisan serve

