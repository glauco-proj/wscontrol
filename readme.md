Recursos utilizados:
- Laravel 5.4
- PostgreSQL 9.3
- PHP 5.6
- JWT

* Desenvolvido em sistema operacional Linux - Ubuntu LTS 14.04

Execução:
* Ter PHP instalado e disponível globalmente
* Clonar ou copiar projeto
* Executar composer install
* Renomear .env.example para .env e configurar o banco de dados no arquivo
* Executar php artisan key:generate para geração de nova chave
* Criar o database conforme configurado
* Executar o comando "php artisan migrate" para criação do banco de dados
  - Existe uma check para o sexo da pessoa na tabela de consulta (tblogperson) com sintaxe especifica para PostgreSQL, se testar em outro banco, remove-la
* Executar o comando "php artisan serve" para iniciar a aplicação
* Importar a Collection com request do Postman na pasta Postman para teste
  - Primeiro executar a requisição "Login" para obter um token (Pode usar o email: admin@mail.com, senha: 123456, gerado no migrate)
  - Posteriormente adicionar o Token recebido no Header para as outras requisições: "PersonInfo", "FibonacciSeries"
    - Já está previamente configurado
