<?php

namespace App\Controllers;

class Home extends BaseController
{
    /*
    public function index(): string
    {
        return view('welcome_message');
    }
    */

    public function home(): string {
        return view('index');
    }

    public function quemSomos(): string {
        return "quemSomos";
    }
    
    public function noticias(): string {
        return "noticias";
    }
   
    public function faleConosco(): string {
        return "faleConosco";
    }
}
