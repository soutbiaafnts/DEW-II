<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home/index');
    }

    public function blog(): string {
        return "Quem responde é Home::blog";
    }

    public function about(): string {
        return "Quem responde é Home::about";
    }

    public function help(): string {
        return "Quem responde é Home::help";
    }
}
