<?php

namespace App\Services;

use App\Models\AlunoModel;

class AlunoService {
    private $alunoModel;

    public function __construct(){
        // alternativa para $this->alunoModel = new AlunoModel();
        $this->alunoModel = model('AlunoModel');
    }

    public function getAll() {
        return $this->alunoModel->findAll();
    }
}