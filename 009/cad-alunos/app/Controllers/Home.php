<?php

namespace App\Controllers;

use App\Models\AlunoModel;

class Home extends BaseController {
    public function index(): string {
        return view('alunos');
    }

    public function cadastrarAluno() {
        // obtem dados do formulário
        $nome = $this->request->getPost('nome_alu');
        $nota = $this->request->getPost('nota_alu');

        // cria um array associativo dos atributos do BD
        $aluno = [
            'noma_alu' => $nome,
            'nota_alu' => $nota
        ];

        $alunoModel = new \App\Models\AlunoModel();

        // o método save, salva ou atualiza
        if ( $alunoModel->save($aluno)) {
            return redirect()->to('/')->with('success', 'Inserido com sucesso.');
        } else {
            return redirect()->to('/')->with('error', 'Erro ao inserir.');
        }
    }
}
