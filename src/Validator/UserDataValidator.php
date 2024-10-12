<?php

namespace App\Validator;

class UserDataValidator
{
    public static function isValidData(array $data): bool
    {
        return array_key_exists('email', $data) && array_key_exists('password', $data);
    }

}