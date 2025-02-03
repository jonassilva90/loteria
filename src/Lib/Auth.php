<?php

namespace Loteria\Lib;

class Auth
{
    public static function getUser(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function login(string $username, string $password): bool
    {
        if (empty($username) || empty($password)) {
            throw new AuthException("Usuário ou senha inválidos");
        }

        // Simulando login
        // TODO Implementar login
        $_SESSION['user'] = [
            'id' => 1,
            'name' => "Jonas Silva",
            'username' => $username
        ];
        return true;

    }
}