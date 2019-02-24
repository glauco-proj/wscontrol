Recursos utilizados:
- Laravel 5.4
- PostgreSQL 9.3
- PHP 5.6
- JWT

* Desenvolvido em sistema operacional Linux - Ubuntu LTS 14.04

Arquivos a serem analisados:
App\LogPerson.php
App\BusinessObjects\* (Camada de Regra de negócio)
App\Http\Controllers\LogPersonController
App\Http\Controllers\FibonacciController
App\Http\Requests\FibonacciRequest
App\Http\Requests\LogPersonRequest
routes\api.php
database\migrations\2019...create_log_person_table.php

Execução:
* Ter PHP instalado e disponível globalmente
* Configurar o banco de dados no arquivo raiz .env
* Executar o comando "php artisan migrate" para criação do banco de dados
  - Existe uma check para o sexo da pessoa na tabela de consulta (tblogperson) com sintaxe especifica para PostgreSQL, se testar em outro banco, remove-la
* Executar o comando "php artisan serve" para iniciar a aplicação
* Importar a Collection com request do Postman na pasta Postman para teste
  - Primeiro executar a requisição "Login" para obter um token (Pode usar o email: admin@mail.com, senha: 123456, gerado no migrate)
  - Posteriormente adicionar o Token recebido no Header para as outras requisições: "PersonInfo", "FibonacciSeries"
  - Já está previamente configurado
