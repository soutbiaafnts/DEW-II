<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $estadoService = service('estado');
        $municipioService = service('municipio');
        
        $resultado = $estadoService->getEstados();

        // d($resultado);

        // $resultado = $municipioService->getMunicipiosByEstado(31);

        // dd($resultado);

        if ($resultado['status'] === 'error') {
            return $resultado['message'];
        }

        $estados = $resultado['data'];

        return view('index', ['estados' => $estados]);
    }
}