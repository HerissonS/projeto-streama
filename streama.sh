#!/bin/bash
# ==============================================================================
# SCRIPT DE AUTOMAÇÃO E DEPLOY - PROJETO STREAMA
# ==============================================================================
set -e

echo "=== [1/5] Instalando dependências ==="
if ! command -v docker-compose &> /dev/null; then
    sudo apt-get update && sudo apt-get install -y docker-compose
fi

echo "=== [2/5] Criando estrutura de diretórios em /streama ==="
sudo mkdir --parents /streama/docker /streama/ldap /streama/signup /streama/volumes/uploads /streama/volumes/local-files
sudo chown -R $USER:$USER /streama
sudo chmod 755 -R /streama

echo "=== [3/5] Copiando arquivos de configuração (sem destruir o repositório local) ==="
cp -r ./LDAP/* /streama/ldap/
cp -r ./SIGNUP/* /streama/signup/
cp -r ./STREAMA/* /streama/docker/

if [ -f ".env" ]; then
    cp .env /streama/ldap/
    cp .env /streama/signup/
    cp .env /streama/docker/
elif [ -f ".env.example" ]; then
    cp .env.example /streama/ldap/.env
    cp .env.example /streama/signup/.env
    cp .env.example /streama/docker/.env
fi

echo "=== [4/5] Baixando executável do Streama (caso não exista) ==="
if [ ! -f "/streama/docker/streama-1.10.4.jar" ]; then
    wget -O /streama/docker/streama-1.10.4.jar https://github.com/streamaserver/streama/releases/download/v1.10.4/streama-1.10.4.jar
fi

echo "=== [5/5] Subindo containers Docker ==="
cd /streama/ldap && sudo docker-compose up -d
cd /streama/signup && sudo docker-compose up -d
cd /streama/docker && sudo docker-compose up -d

echo "=== Ambientação concluída com sucesso! ==="
echo "Página de Signup: http://<IP_DO_SERVIDOR>:80"
echo "Aplicação Streama: http://<IP_DO_SERVIDOR>:8080"
echo "phpLDAPadmin:      http://<IP_DO_SERVIDOR>:8096"