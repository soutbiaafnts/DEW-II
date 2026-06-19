<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        session();
        return view('index');
    }


    public function consultaCep() {
        // Obtendo o CEP enviado pelo formulário
        $cep = $this->request->getPost('cep');

        // iniciando o service
        $cepService = service('cep');

        $resultado = $cepService->consultaCEP($cep);

        if ($resultado['status'] == 'success') {
            // d($resultado['data']);
            return redirect()->back()->with('cepData', $resultado['data']);
        } else {
            // echo $resultado['msg'];
            return redirect()->back()->with('error', 'Erro ao consultar o CEP' . $resultado['msg']);
        }
    }
}