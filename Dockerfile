# Utilize a imagem oficial do PHP 8.2 com Apache
FROM php:8.2-apache

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie os arquivos do projeto para o container
COPY . /var/www/html/

# Copie o arquivo de configuração do Apache
COPY ./apache.conf /etc/apache2/apache.conf

# Habilite o módulo mod_rewrite
RUN a2enmod rewrite

# Instale as dependências do Composer
RUN chmod +x ./composer.phar

# Instale as dependências do Composer
RUN ./composer.phar install --no-dev --prefer-dist

# Exponha a porta 8080
EXPOSE 80

# Inicie o Apache quando o container for iniciado
CMD ["apache2-foreground"]