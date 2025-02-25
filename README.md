# API Techpines


```bash
php: 8.2
laravel: 11
```

## Iniciando

Clone o projeto, usando o comando abaixo (usando HTTPS):

```bash

git clone https://github.com/RuanSilva6721/techpines.git
```



Depois de clonar, acesse o repositório e instale as dependências com os comandos abaixo (para isso, utilize o [Composer](https://getcomposer.org/) ):

```bash

cd techpines
composer install
```



Após instalar as dependências, duplique o arquivo `.env.example` e renomeie um deles para `.env`.

Gere uma nova chave da aplicação:

```bash

php artisan key:generate
```



Altere as configurações no arquivo `.env` para que o projeto se conecte ao banco de dados.


Execute o comando abaixo para que as tabelas sejam criadas no banco de dados:

```bash

php artisan migrate
```



Inicie o servidor da aplicação com o comando:

```bash

php artisan serve
```


Para ver o projeto em execução, acesse [http://localhost:8000](http://localhost:8000/) .

Caso queira adicionar dados fictícios no banco:

```bash

php artisan db:seed 
```

## Construído com 
- [Laravel](https://laravel.com/)
