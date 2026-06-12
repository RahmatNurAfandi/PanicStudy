<?php

namespace App\Contracts;

interface AuthInterface
{
    public function register(array $data);

    public function login(string $email, string $password);

    public function logout(int $userId);

    public function getProfile(int $userId);

    public function updateProfile(int $userId, array $data);
}