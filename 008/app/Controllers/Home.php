<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string {
        try {
            // cria um objeto de conexão com o banco de dados
            $db = db_connect();
    
            // fazer a conexão
            $db->initialize();
    
            // verifica a conexão
            if ($db->connID)
                echo 'Conectado';
            else
                echo 'Erro na conexão';
        } catch (\Throwable $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }
        
        return '';
    }

    public function alunos(): string {
        $alunoModel = model('AlunoModel');

        $alunos = $alunoModel->findAll();

        // dd($alunos);

        // ponto 7 -> vetor a
        $dados = [
            'alunos',
            $alunos
        ];

        echo "<pre>";
        var_dump($dados);
        echo "</pre>";


        return '';
    }
}
