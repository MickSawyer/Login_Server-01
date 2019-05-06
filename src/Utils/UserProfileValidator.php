<?php

namespace App\Utils;

class UserProfileValidator {



    public function validateUserProfile ($var = null)
    {
        validateUsername($var['username']);
        validateUsername($var['password']);
        validateUsername($var['email']);
        validateUsername($var['full_name']);

        if (sizeof( $err) === 0){
            return true;
        } else {
            return $err;
        }
    }
    

    private function validateUsername(?string $username): integer
    {
        if (empty($username)) {
            $err['11'] = 'Empty username';
        }

        if (1 !== preg_match('/^[a-z_]+$/', $username)) {
            $err['12'] = 'Username Should not contain special characters';
        }

        return 0;
    }

    private function validatePassword(?string $plainPassword): string
    {
        if (empty($plainPassword)) {
            $err['21'] = "Empty Password";
        }

        if (count_chars($plainPassword) < 8) { 
            $err['22'] = "Password should be more than 8 chars long";
        }

        return 0;
    }

    private function validateEmail(?string $email): string
    {
        if (empty($email)) 
            $err["31"] = "Empty Email";
        

        if (false === mb_strpos($email, '@')) 
            $err["32"] = "Not Valid Email";
        

        if (false === mb_strpos(substr(trim($email) , -4), '.' )) 
            $err["32"] = "Not Valid Email";
        
        return 0;
    }

    private function validateFullName(?string $fullName): string
    {
        if (empty($fullName)) {
            $err["41"] = "Empty Full Name";
        }

        return 0;
    }

}