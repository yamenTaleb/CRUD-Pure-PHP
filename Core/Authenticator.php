<?php

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password): bool
    {
        $user =App::resolve(Database::class)->query('SELECT' . '* FROM users WHERE email = :email', [
            'email' => $email,
        ])->findOrFail();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        }
        return false;
    }

    public function login(array $user): void
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public static function logout(): void
    {
        Session::destroy();
    }

}