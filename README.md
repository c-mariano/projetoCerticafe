# 💼 Vendas Manager — Sistema de Agendamentos

Este projeto é um sistema simples de agendamento criado para uma consultoria de vendas que atende clientes online e presencialmente. O objetivo é digitalizar os agendamentos da empresa, permitindo visualizar compromissos futuros e passados, além de criar, editar e excluir agendamentos com facilidade.

---

## 🔧 Funcionalidades

- Login de administrador  
- Listagem de agendamentos futuros e passados  
- Criação de novos agendamentos  
- Edição de agendamentos existentes  
- Exclusão de agendamentos com confirmação  

---

## 📌 Cada agendamento possui

- Data de início e fim  
- Título e descrição  
- Nome do cliente  

---

## 🛠️ Tecnologias utilizadas

- PHP  
- MySQL  
- HTML, CSS e JavaScript  

---

## 🚀 Como rodar o projeto

1. Clone o repositório  
2. Importe o arquivo `database/schema.sql` no MySQL  
3. Configure a conexão com o banco de dados no arquivo `includes/config.php`  
4. Inicie o servidor com XAMPP ou similar (o diretório raiz deve apontar para a pasta `/public`)  
5. Acesse `localhost/projeto-certicafe/public/login.php` no navegador  

---

## 📂 Organização de pastas

- `/public` → Arquivos públicos acessados pelo navegador (login, home, etc.)  
- `/assets` → CSS, imagens e demais recursos visuais  
- `/includes` → Arquivos auxiliares (conexão, validações, etc.)  
- `/database` → Script SQL de criação do banco  

---

✅ Projeto desenvolvido como desafio técnico para uma vaga de desenvolvimento web.
