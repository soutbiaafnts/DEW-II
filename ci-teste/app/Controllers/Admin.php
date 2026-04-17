<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard(): string
    {
        return "Quem responde é Admin::dashboard";
    }
    public function login(): string
    {
        return "Quem responde é Admin::login";
    }
    public function logout(): string
    {
        return "Quem responde é Admin::logout";
    }

}
