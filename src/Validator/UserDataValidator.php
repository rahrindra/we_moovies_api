<?php

namespace App\Validator;

class UserDataValidator
{
    public static function isValidData(array $data): bool
    {
        // @todo amélioration ajout controle email et mot de passe
        return array_key_exists('email', $data) && array_key_exists('password', $data);
    }

}