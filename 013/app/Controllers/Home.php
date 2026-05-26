<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $estadoService = service('estado');

        $resultado = $estadoService->getEstados();

        dd($resultado);
        
        return view('index');
    }
}