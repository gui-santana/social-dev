# Usa uma imagem oficial do PHP 8.2 com o servidor web Apache.
FROM php:8.2-apache

# Define o diretório de trabalho dentro do container.
WORKDIR /var/www/html

# ADICIONE ESTE BLOCO PARA INSTALAR NODE.JS E NPM
# Define a versão do Node.js
ARG NODE_MAJOR=20
# Descarrega e executa o script de instalação oficial do NodeSource
RUN apt-get update && apt-get install -y ca-certificates curl gnupg \
    && mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_MAJOR.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt-get update && apt-get install nodejs -y

# Instala as dependências do sistema e extensões do PHP necessárias para o Laravel.
# Isso inclui ferramentas para lidar com imagens (gd), zips, e o próprio git.
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    libpq-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip exif pcntl bcmath gd

# Instala o Composer globalmente.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os ficheiros da aplicação do seu computador para dentro do container.
COPY . .

# Dá permissão de execução ao nosso script de arranque
RUN chmod +x /var/www/html/start.sh

# Roda o 'composer install' para instalar as dependências do Laravel.
# As flags são para otimização em ambiente de produção.
RUN composer install --optimize-autoloader --no-dev

# Instala as dependências do frontend
RUN npm install

# Compila os assets para produção (isto cria a pasta /public/build e o manifest.json)
RUN npm run build

# Altera a propriedade dos ficheiros para o utilizador do Apache, evitando problemas de permissão.
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copia a configuração do Apache para apontar para a pasta /public do Laravel.
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Expõe a porta 80
EXPOSE 80

# Define o nosso script como o comando de arranque do container
CMD ["/var/www/html/start.sh"]