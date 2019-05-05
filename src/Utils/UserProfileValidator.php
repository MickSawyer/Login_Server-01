<?php

namespace App\Utils;

class UserProfileValidator {

    public function validateUserProfile ($var = null)
    {
        # code...
    }
    

    public function validateUsername(?string $username): integer
    {
        if (empty($username)) {
            return 11;
        }

        if (1 !== preg_match('/^[a-z_]+$/', $username)) {
            return 12);
        }

        return 0;
    }

    public function validatePassword(?string $plainPassword): string
    {
        if (empty($plainPassword)) {
            return 21;
        }

        if (count_chars($plainPassword) < 8) {
            return 22;
        }

        return 0;
    }

    public function validateEmail(?string $email): string
    {
        if (empty($email)) {
            return 31;
        }

        if (false === mb_strpos($email, '@')) {
            return 32;
        }

        return 0;
    }

    public function validateFullName(?string $fullName): string
    {
        if (empty($fullName)) {
            return 41;
        }

        return 0;
    }

}