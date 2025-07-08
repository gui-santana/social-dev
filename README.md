# SocialDev - Rede Social com Laravel e Vue.js

Uma micro-rede social para desenvolvedores construída do zero, utilizando um ecossistema de frameworks modernos. Este projeto foi o resultado final de um curso completo de desenvolvimento web Full-Stack, abrangendo desde os fundamentos do PHP até o deploy de uma aplicação complexa na nuvem.

![Badge de Deploy do Render](https://render.com/images/deploy-to-render-button.svg)

---

### Link da Aplicação

[**➡️ Acesse a aplicação ao vivo aqui!**](https://social-dev-app.onrender.com)

---

### ✨ Principais Funcionalidades

* **Autenticação Completa:** Sistema seguro de cadastro, login e logout de usuários.
* **Perfis de Usuário:** Páginas de perfil públicas para cada usuário.
* **CRUD de Posts:** Usuários autenticados podem criar, visualizar, editar e deletar seus próprios posts.
* **Sistema de "Seguir":** Um usuário pode seguir e deixar de seguir outros usuários.
* **Feed Pessoal:** Um feed na dashboard que mostra os posts mais recentes das pessoas que o usuário segue.
* **Upload de Arquivos:** Funcionalidade para upload de foto de perfil.
* **Autorização:** Middlewares que garantem que um usuário só possa editar ou deletar seus próprios posts.

---

### 💻 Stack de Tecnologias

Este projeto foi construído utilizando as seguintes tecnologias e ferramentas:

* **Backend:**
    * **PHP 8.2+**
    * **Laravel 11+**
    * **Eloquent ORM** (para interação com a base de dados)
    * **Blade** (para templating)
    * **API RESTful** para comunicação com o frontend.

* **Frontend:**
    * **JavaScript (ES6+)**
    * **Vue.js 3** (para componentes reativos)
    * **Tailwind CSS** (para estilização utility-first)
    * **Vite** (para o build dos assets)
    * **Axios** (para as requisições HTTP)

* **Banco de Dados:**
    * **PostgreSQL** (em produção no Render)
    * **MySQL** (em desenvolvimento local)

* **Infraestrutura e Deploy:**
    * **Docker**
    * **Render** (Plataforma como Serviço - PaaS)
    * **Git & GitHub** (para versionamento e CI/CD)

---

### 🚀 Como Executar o Projeto Localmente

Siga os passos abaixo para configurar e rodar a aplicação no seu ambiente de desenvolvimento.

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/gui-santana/social-dev.git](https://github.com/gui-santana/social-dev.git)
    ```

2.  **Navegue até a pasta do projeto:**
    ```bash
    cd social-dev
    ```

3.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```

4.  **Instale as dependências do JavaScript:**
    ```bash
    npm install
    ```

5.  **Crie o arquivo de ambiente:**
    * Copie o arquivo de exemplo `.env.example` para um novo arquivo chamado `.env`.
    ```bash
    cp .env.example .env
    ```

6.  **Gere a chave da aplicação:**
    ```bash
    php artisan key:generate
    ```

7.  **Configure o `.env`:**
    * Abra o arquivo `.env` e configure as suas credenciais do banco de dados local (MySQL).
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=curso_php_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

8.  **Execute as migrations e popule o banco:**
    * Este comando irá criar todas as tabelas e preenchê-las com dados de teste.
    ```bash
    php artisan migrate:fresh --seed
    ```

9.  **Crie o link de armazenamento:**
    ```bash
    php artisan storage:link
    ```

10. **Inicie os servidores:**
    * Você precisará de dois terminais abertos.
    * **Terminal 1 (Frontend):**
        ```bash
        npm run dev
        ```
    * **Terminal 2 (Backend):**
        ```bash
        php artisan serve
        ```

Pronto! A aplicação estará disponível em `http://127.0.0.1:8000`.

---

### 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE.md) para mais detalhes.

---

### 📬 Contato

**Guilherme Santana**

* Email: [business@guilhermesantana.com.br](mailto:business@guilhermesantana.com.br)
* GitHub: [@gui-santana](https://github.com/gui-santana)
