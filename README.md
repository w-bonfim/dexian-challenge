# Dexian Challenge

API RESTful para gerenciamento de clientes, produtos e pedidos de uma pastelaria.

## Requisitos

- PHP >= 8.2
- Composer
- MySQL

## Clonar o repositório

```bash
git clone https://github.com/w-bonfim/dexian-challenge.git
cd dexian-challenge
```

## Instalar as dependências

```bash
composer install
```

## Configuração do ambiente

Copie o arquivo de exemplo e configure o acesso ao banco de dados e e-mail no arquivo `.env`:

```bash
cp .env.example .env
```

No `.env`, ajuste as variáveis:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Configuração de e-mail (exemplo com Mailtrap)
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=seu_username
MAIL_PASSWORD=sua_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="Dexian Challenge"
```

## Executar as migrations

```bash
php artisan migrate
```

## Popular o banco de dados com dados de exemplo

```bash
php artisan db:seed
```

## Iniciar o servidor de desenvolvimento

```bash
php artisan serve
```

## Rodar os testes

```bash
php artisan test
```

## Endpoints principais

- Autenticação: `/api/register`, `/api/login`, `/api/logout`
- Clientes: `/api/customers`
- Produtos: `/api/products`
- Pedidos: `/api/orders`

> **Obs:** Para acessar os endpoints de clientes, produtos e pedidos, é necessário estar autenticado via Sanctum.

---

## Postman Collection

Uma **collection do Postman** foi criada com todos os endpoints da API, incluindo variáveis para configurar a URL base e o token de autenticação.  
Isso facilita o teste e a integração dos endpoints.

O arquivo da collection está disponível na pasta `docs` do projeto.

Importe o arquivo `.json` da collection no Postman, ajuste as variáveis `{{base_url}}` e `{{token}}` conforme necessário e utilize todos os endpoints rapidamente.

