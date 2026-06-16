<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }


    public function consultaCep()
    {
        //Obtendo o CEP enviado pelo formulário
        $cep = $this->request->getPost('cep');

        d($cep); // Exibe o CEP recebido para verificação
    }
}