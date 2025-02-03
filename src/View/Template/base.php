<?php
use Loteria\Lib\Auth;
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Loteria<?php if(isset($title)): ?> - <?=$title?><?php endif; ?></title>
</head>
<body>
    <?php if(Auth::isLogged()): ?>
        <header>
            <div class="menu-main">
                <a href="/">Gerar Bilhetes</a>
                <div style="flex:1;text-align: right;">Olá, <?= Auth::getUser()['name']?>.</div>
                <a href="/logout">Sair</a>
            </div>
        </header>
    <?php endif; ?>
    <div class="container main">
        <?=$contentView?>
    </div>
    <?=$contentPrevious?>
</body>
</html>