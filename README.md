# Sistema de Gerenciamento de Usuários

Este projeto é um sistema simples de gerenciamento de usuários, desenvolvido com PHP, MySQL e HTML/CSS. O sistema permite que os administradores adicionem, editem, visualizem e excluam usuários, mantendo a interface limpa e funcional. Foi desenvolvido para fins educacionais, mas pode ser facilmente adaptado para ser usado em outros projetos que necessitem de controle de usuários.

## Funcionalidades

- **Cadastro de Usuários**: Permite adicionar novos usuários ao sistema, fornecendo informações como nome, e-mail e data de nascimento.
- **Edição de Usuários**: Possibilita a modificação dos dados de um usuário existente.
- **Visualização de Usuários**: Exibe informações detalhadas sobre um usuário.
- **Exclusão de Usuários**: Permite excluir um usuário do sistema de forma segura, com uma confirmação de exclusão.

## Tecnologias Utilizadas

- **PHP**: Para o back-end do sistema, com operações como inserção, edição, exibição e exclusão de dados no banco de dados.
- **MySQL**: Banco de dados relacional para armazenar as informações dos usuários.
- **HTML5/CSS3**: Para estruturar e estilizar as páginas do sistema, com uma interface amigável e responsiva.
- **JavaScript**: Para pequenas interações no front-end, como a confirmação de exclusão de usuários.

## Funcionalidades do Sistema

1. **Página Inicial**: Exibe uma lista de todos os usuários cadastrados no sistema, com a possibilidade de visualizar, editar ou excluir cada um deles.
2. **Página de Adicionar Usuário**: Formulário para adicionar novos usuários ao banco de dados.
3. **Página de Editar Usuário**: Permite editar os dados de um usuário existente.
4. **Página de Visualização de Usuário**: Mostra detalhes de um usuário, como nome, e-mail e data de nascimento.
5. **Página de Exclusão de Usuário**: Exclui um usuário do sistema após confirmação.

## Como Usar
1. Clone este repositório para sua máquina local:

   ```bash
   git clone https://github.com/seu-usuario/nome-do-repositorio.git

2. Configure o banco de dados MySQL com o seguinte esquema:

sql
Copiar código
CREATE DATABASE sistema_usuarios;
USE sistema_usuarios;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    data_nascimento DATE
);

Abra o arquivo conexao.php e configure as credenciais do banco de dados.

Index:
![image](https://github.com/user-attachments/assets/36fd83cb-2005-4abd-9953-03181e06fa53)


Adicionar usuário:
![image](https://github.com/user-attachments/assets/9fe6eb15-b6cb-43a9-ac38-ba7686cc5445)

Usuário Criado:
![image](https://github.com/user-attachments/assets/fdfefb9c-8dcc-44b1-9fe2-af63ce6151df)

Editar Usuário:
![image](https://github.com/user-attachments/assets/266d3b65-9a47-4b6f-9e63-a616f72bf152)

Excluir usuário:
![image](https://github.com/user-attachments/assets/49eccb6d-9cbe-4e25-9fc6-4cd4f6f14bb2)




