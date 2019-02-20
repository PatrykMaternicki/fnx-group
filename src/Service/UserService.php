<?php

namespace App\Service;

use App\Entity\User;

class UserService
{
    public function correctPassword($inputPassword, $outputPassword)
    {
        return $inputPassword === $outputPassword;
    }
}
