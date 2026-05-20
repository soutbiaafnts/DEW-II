<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $alunoService = service('alunos');
        $alunos = $alunoService->getAll();
        d($alunos);
        return '';
    }


}
