
# Executar o projeto

## Via Docker

### Faça o buid da imagem

```sh
docker build -t loteria .
```

### Rode o projeto, executando o container

```sh
docker run -p 8080:80 loteria
```

### Acesse via

http://localhost:8080

## Ambiente de desenvolvimento

## antes deve rodar o composer install:

```sh
composer install
```

### Rode o projeto

```sh
php -s localhost:8080
```

## Interface HTML

Pode ser acessado pelo navegador e testar a função para gerar os bilhetes.
Antes deve fazer o login (informe qualquer usuario e senha).

## Acesso via API

Faça um post para `http://localhost:8080/api/gerar-bilhetes` com os seguintes campos:

| Campo      | Descrição                                     |
|------------|-----------------------------------------------|
| quantidade | Quantidade de bilhetes, minímo 1 e máximo 50. |
| dezenas    | Número de dezenas. mínimo 6 e máximo 10.      |

### Resposta

Quando a api tiver sucesso ao gerar os bilhetes ele deve responder o seguinte conteúdo html como este em:

HTTP 200 

```html
<h3>Bilhete Premiado</h3>

<span><strong>3</strong></span>
<span><strong>6</strong></span>
<span><strong>8</strong></span>
<span><strong>15</strong></span>
<span><strong>27</strong></span>
<span><strong>37</strong></span>

<h3>Bilhetes Gerados</h3>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Bilhete</th>
            <th>Situção</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>
                <span>01</span>
                <span>02</span>
                <span>16</span>
                <span>17</span>
                <span>28</span>
                <span>43</span>
                <span>50</span>
                <span>59</span>
            </td>
            <td>Não premiado</td>
        </tr>
    </tbody>
</table>
```

Caso a requisição correr um erro nos dados enviados por falta ou incorretos será retornado o status `http 400` e no body um html contendo a descrição do erro.

## Estrutura de pastas

```
📦 assets                 # Arquivos de assets para o front, como imagens, css e js
├── 📂 src                # Código-fonte principal do projeto
│   ├── 📂 Controller     # Controllers do projeto
│   ├── 📂 Lib            # Classes responsáveis por serviços base para o projeto como authenticação e geração dos bilhetes.
│   ├── 📂 routes         
│        └── 📄 http.php  # Arquivo de rotas
│   ├── 📂 View           # Arquivos das views
│        └── 📂 Template  # Arquivos template(skin) para as views
├── 📄 config.php         # Arquivo para configurações gerais
```