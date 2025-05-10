# 📦 devops-nginx-php

Ambiente local com **Nginx**, **PHP-FPM** e **Docker Compose**, estruturado como microsserviços para testes e deploys de aplicações PHP.

---

## ✅ Objetivo

Criar um ambiente de desenvolvimento local que simula uma estrutura de produção moderna com:
- Servidor web (Nginx)
- Interpretador PHP (PHP-FPM)
- Gerenciamento via Docker Compose

---

## ⚙️ Tecnologias utilizadas

- Docker
- Docker Compose
- Nginx
- PHP 8.1 (FPM)
- Windows 11 (Docker Desktop com WSL 2)

---

## 🚀 Como instalar e rodar o projeto

### 1. Pré-requisitos

- Docker Desktop instalado e rodando no Windows 11
- Terminal PowerShell, CMD ou VS Code

### 2. Clone o repositório

```bash
git clone https://github.com/seu-usuario/devops-nginx-php.git
cd devops-nginx-php
```

### 3. Execute o ambiente com Docker

```bash
docker compose up --build
```

### 4. Acesse no navegador:

```
http://localhost:8080
```

Você verá a mensagem:
```
Olá, mundo!
```

### 5. Parar os containers:

```bash
docker compose down
```

---

## 📁 Estrutura do projeto

```
devops-nginx-php/
├── docker-compose.yml
├── html/
│   └── index.php
├── nginx/
│   └── default.conf
├── Dockerfile
```

---

## 💡 Particularidades

- O `Dockerfile` está na raiz e monta a imagem do PHP-FPM.
- O Nginx redireciona requisições `.php` para o PHP-FPM na porta `9000`.
- O projeto expõe a porta `8080` para evitar conflitos com servidores locais.

---

## 📌 Autor

Desenvolvido para o **Teste Prático da vaga DevOps** – SCI Sistemas Contábeis