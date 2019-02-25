Esta aplicaçao foi feita como teste para vaga de estagio da empresa H4Money.
Tendo como condiçao a utilizaçao de PHP puro (vanilla).

## Objetivo

Sistem de CRUD de clientes com autenticaçao(incluindo anti sql injection e recaptcha), utilizando PHP vanilla e o template AdminLTE 2.4.5 , tendo consulta de cep para o cadastro de clientes via webservice https://viacep.com.br/ e validaçao de campos no Back e Front-end utilizando PHP e JS.

## Instalação 

* Crie um BD com o nome de etapa2(ou mude o nome do banco no arquivo Config)
* importe as tabelas cliente e usuario(arquivos sql dentro da pasta database)
* Acesse o arquivo config e adicione suas chaves de acesso ao recaptcha V2 (podem ser obtidas em http://www.google.com/recaptcha/admin) 
* Dentro da pasta do projeto, abra o terminal e digite php -S localhost:8001
* Acesse o link http://localhost:8001
