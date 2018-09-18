# Verificação de CPF

Instalação do ambiente de desenvolvimento
- Instalar o docker
- Instalar o docker-compose
- Após instalação configurar a variável `BASE_PATH` do arquivo `.env` na pasta docker com o path onde foi adicionado o projeto
- Entre na pasta `docker` dentro do projeto e rode o comando `docker-compose up --build`
- Ainda dentro da pasta `docker` acesse o container do projeto com o comando `docker-compose exec app bash
`
- Dentro do container no path `/var/www/html` rode o comando `composer install` para baixar as dependências necessárias.
- Agora rode o comando `composer migrate` para criar as tabelas necessárias.
- Esse comando não é necessário mas se já popular a tabela de blacklist com um cpf rode `composer seed`
- Acesse a url `http://localhost` em seu browser de preferência
- Para testar o projeto via REST as rotas se encontram no arquivo `routes/app.yml`
- Para rodar os testes utilize `composer test test`
