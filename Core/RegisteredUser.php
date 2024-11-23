<?php

namespace Core;

class RegisteredUser
{
    public Database $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }
    public function create(string $email, string $password): void
    {
        if (!$user = $this->exist($email)) {

            $id = $this->db->query('INSERT' . ' INTO users (email, password) VALUES (:email, :password)', [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ])->lastId();
            $user['id'] = $id;

            (new Authenticator)->login($user);
        }
    }

    public function exist(string $email): bool|array
    {
        return $this->db->query('SELECT' . ' * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();
    }
}