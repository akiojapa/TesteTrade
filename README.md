
<h1 align = "center" > Teste técnico trade </h1>


## Biblioteca ##
```
Instale os requisitos abaixo e siga as Instruções para executar o Projeto.
```



## Dependências 

- <a href=https://git-scm.com/download>Git</a>
- <a href=https://getcomposer.org/download/> Compose </a>
- <a href=https://www.npmjs.com/package/npm> NPM </a>
- <a href=https://www.apachefriends.org/download.html> Apache </a>
- <a href=https://https://insomnia.rest/download> Insomnia </a>


## Status do projeto 
> :soon: Projeto em andamento :soon:


## Descrição do projeto 

O Projeto consiste em uma simulação de campeonatos que foi o teste prático aplicado pela empresa Trade Technology.


## :hammer: Instruções

`Pasta: ` Após instalar o Git, crie uma nova pasta com o nome campeonato;

`Terminal:`Abra um terminal de sua preferência e acesse a pasta "campeonato";

`Git:`Utilize o comando git clone https://github.com/akiojapa/TesteTrade.git no terminal para clonar o repositório dentro da pasta que foi criada.

`Xampp`: Após instalar o xampp(Caso não tenha sido executado, só utilizar a tecla 'Windows' e digitar 'xampp'), então iniciar o modulo apache e mysql.

`MySQL`: O MySQL já estará configurado, desta forma, seguindo este módulo, selecione a opção 'admin' e criar um novo banco chamado 'teste_trade'

`Composer`: Na pasta que foi clonada, se dirija até o diretório de back-end, abra um terminal e digite o comando 'composer install'

`Laravel`: Ainda na mesma pasta 'backend', utilize a sequência de comando: 
php artisan key:generate
php artisan migrate

`env`: Na pasta 'backend' não se esqueça de renomear o arquivo '.env.example' para '.env'

`API`: Agora inicie a API, utilizando o comando 'php artisan serve'

`Insomnia`: Abra o insomnia e importe o arquivo na pasta principal deste projeto e execute a rota 'Criar um novo usuário' para poder então utilizar o sistema

`NPM`: Agora se dirija a pasta 'frontend', com o terminal aberto digite o comando 'npm install'

`React`: Ainda na pasta 'frontend', utilize o comando 'npm run dev' e o servidor irá para o ar, geralmente na porta 5173, de qualquer forma o terminal irá sinalizar em qual endereço a aplicação se encontra.


