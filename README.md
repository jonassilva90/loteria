
# Faça o buid

```sh
docker build -t loteria .
```

# rode o projeto

```sh
docker run -p 8080:8080 loteria
```

# Acesse via

http://localhost:8080

# Em ambiente de teste pode executar pelo php

# antes deve rodar o composer install:

```sh
composer install
```

```sh
php -s localhost:8080
```