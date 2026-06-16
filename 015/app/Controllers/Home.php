<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }


    public function consultaCep() {
        // Obtendo o CEP enviado pelo formulário
        $cep = $this->request->getPost('cep');

        // iniciando o service
        $cepService = service('cep');

        $resultado = $cepService->consultaCEP($cep);

        if ($resultado['status'] == 'success') {
            d($resultado['data']);
        } else {
            echo $resultado['msg'];
        }
    }
}