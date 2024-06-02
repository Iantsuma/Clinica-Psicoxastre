#!/bin/bash

# Esperar até que o MySQL esteja pronto para aceitar conexões
until nc -z -v -w30 db 3306
do
  echo "Esperando pelo banco de dados..."
  sleep 1
done

# Iniciar o Apache em primeiro plano
apache2-foreground &

# Mudar para o diretório do Laravel
cd /var/www/html

# Copiar a .env.example para .env
cp .env.example .env

# Gerar a chave da aplicação Laravel
php artisan key:generate

# Executar as migrações do Laravel
php artisan migrate

# Rodar seed do banco de dados
php artisan db:seed

# Executar npm run dev
npm run dev &

# Mantém o contêiner em execução
tail -f /dev/null
