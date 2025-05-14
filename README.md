# devops-nginx-php

![CI/CD](https://github.com/walquiriaavelar/devops-nginx-php/actions/workflows/ci-cd-pipeline.yml/badge.svg)

## Descrição

Este repositório contém:

- **Workflow GitHub Actions** para build das imagens Docker (PHP-FPM e Nginx).  
- Testes básicos de smoke test via `curl`.  
- Deploy automático em instância EC2 via SSH + `docker-compose`.

## Como usar

1. Clone o repo  
2. Configure as [Secrets](https://docs.github.com/actions/security-guides/encrypted-secrets)  
3. Push em `main` para disparar o pipeline  


📦 devops-nginx-php

Ambiente local com Nginx, PHP-FPM e Docker Compose, estruturado como microsserviços para testes e deploys de aplicações PHP.

✅ Etapas do Projeto

1. Configuração do ambiente local usando estrutura de microsserviços

Instale o Docker em seu ambiente de desenvolvimento local (Windows 11 com Docker Desktop)

Crie um container Docker para executar um servidor web Nginx

Configure o contêiner para expor a porta 80 (neste projeto usamos a 8080 para evitar conflitos locais)

Crie um contêiner PHP-FPM para receber requisições do Nginx na porta 9000

Crie um arquivo index.php simples que retorna: Olá, mundo!

Obs: Utilizamos imagens oficiais do Docker Hub para Nginx e PHP.

2. Implantação na AWS

Crie uma conta AWS (free tier)

Crie uma instância EC2 (Amazon Linux 2023, tipo t2.micro)

Configure o grupo de segurança para liberar a porta 8080 (ou 80 se preferir)

Instale o Docker e Docker Compose na instância EC2

Transfira os arquivos via scp

Execute os containers com docker compose up -d --build

Acesse a aplicação pelo IP público da EC2 no navegador (ex: http://3.142.184.60:8080)

3. Automação

O projeto inclui um arquivo docker-compose.yml que configura os serviços Nginx e PHP-FPM

Facilita a execução em qualquer ambiente com docker compose up

4. Documentação (Este README)

Este README detalha:

Como executar o projeto localmente

Como implantar na AWS

Particularidades do projeto

Comandos utilizados

⚙️ Tecnologias utilizadas

Docker

Docker Compose

Nginx

PHP 8.1 (FPM)

Amazon EC2

Windows 11 (Docker Desktop com WSL 2)

🚀 Como instalar e rodar o projeto (localmente)

1. Clone o repositório

git clone https://github.com/walquiriaavelar/devops-nginx-php.git
cd devops-nginx-php

2. Execute com Docker Compose

docker compose up --build

3. Acesse no navegador

http://3.142.184.60:8080/

Mensagem esperada:

Olá, mundo!

4. Parar os containers

docker compose down

📁 Estrutura do projeto

devops-nginx-php/
├── docker-compose.yml
├── html/
│   └── index.php
├── nginx/
│   └── default.conf
├── php/
│   └── Dockerfile
├── README.md

☁️ Deploy na AWS EC2

1. Conectar na instância

ssh -i "C:/Users/7390/Desktop/devops-teste/DOCKER/key.pem" ec2-user@3.142.184.60

2. Instalar Docker e Docker Compose

sudo yum update -y
sudo yum install docker -y
sudo service docker start
sudo usermod -a -G docker ec2-user
exit
# reconectar para aplicar permissões
ssh -i "C:/Users/7390/Desktop/devops-teste/DOCKER/key.pem" ec2-user@3.142.184.60

# instalar docker compose v2
mkdir -p ~/.docker/cli-plugins/
curl -SL https://github.com/docker/compose/releases/download/v2.27.1/docker-compose-linux-x86_64 -o ~/.docker/cli-plugins/docker-compose
chmod +x ~/.docker/cli-plugins/docker-compose
docker compose version

3. Transferir arquivos para EC2

scp -i "C:/Users/7390/Desktop/devops-teste/DOCKER/key.pem" ./devops-nginx-php/php/html/index.php ec2-user@3.142.184.60:/home/ec2-user/devops-nginx-php/php/html/

4. Rodar projeto na EC2

cd devops-nginx-php
docker compose up -d --build

5. Acessar no navegador

http://3.142.184.60:8080/

Mensagem esperada:

Olá, mundo!

💡 Particularidades

O index.php está dentro de html/

O container PHP-FPM é construído via Dockerfile personalizado

O Nginx redireciona requisições PHP para o PHP-FPM na porta 9000

O projeto usa a porta 8080 para evitar conflitos com a 80 localmente

👩‍💻 Autor

Desenvolvido por Walquíria Avelar para o Teste Prático da vaga DevOps – SCI Sistemas Contábeis

Repositório: https://github.com/walquiriaavelar/devops-nginx-php# Força execução do deploy automatizado

## ✅ Deploy automático via GitHub Actions

*Deploy validado sem erros.*  
1. Adicione o arquivo `.github/workflows/deploy-ec2.yml` ao repositório.  
2. Configure os **Secrets** no GitHub: `EC2_HOST`, `EC2_USER` e `EC2_SSH_KEY` (cole a cópia exata da sua chave PEM).  
3. Faça push no branch `main` e aguarde a execução bem-sucedida na aba **Actions**.  
4. O workflow conecta por SSH à EC2, faz `scp` dos arquivos e executa:
   ```bash
   docker-compose down && docker-compose up -d --build

   💡 Particularidades

O projeto usa a porta 8080 para evitar conflitos com a 80 localmente

#### ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## 

*Deploy validado sem erros.*  
1. Adicione o arquivo `.github/workflows/deploy-ec2.yml` ao repositório.  
2. Configure os **Secrets** no GitHub: `EC2_HOST`, `EC2_USER` e `EC2_SSH_KEY` (cole a cópia exata da sua chave PEM).  
3. Faça push no branch `main` e aguarde a execução bem-sucedida na aba **Actions**.  
4. O workflow conecta por SSH à EC2, faz `scp` dos arquivos e executa:
   ```bash
   docker-compose down && docker-compose up -d --build

