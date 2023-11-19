Para subir o sistema você deve possuir o Git e o Docker instalado. Tendo essas duas ferramentas instaladas, basta seguir as etapas abaixo:

1 - Fazer a cópia do repositório executando o comando abaixo no terminal no local que deseja fazer a cópia do repositório:
- git clone https://github.com/PedroLima8080/file-share.git

2 - Entrar no diretório executando o comando abaixo no mesmo terminal
- cd ./file-share

3 - Faça uma cópia do arquivo .env.example para .env executando o comando abaixo no mesmo terminal
- cp .env.example .env

4 - Suba os containers do docker
- 4.1 - cd .\.docker\dev\
- 4.2 - docker compose up -d --build 
- 4.3 - docker network create file-share
- 4.4 - docker compose up -d

5 - Finalizando instalação
- 5.1 - docker exec -it file-share-app bash
- 5.2 - composer install
- 5.3 - php artisan key:generate
- 5.4 - php artisan migrate
- 5.5 - php artisan db:seed --class=AdminSeeder
- 5.6 - php artisan storage:lin

Após seguir estas etapas, o sistema estara disponivel no endereço: http://localhost/login
O login de admin é:
 - Email: admin@admin.com
 - Senha: 123
 
 
