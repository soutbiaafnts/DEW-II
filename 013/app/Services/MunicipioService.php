<?php
namespace App\Services;

use App\Models\MunicipioModel;

class MunicipioService
{
    protected $municipioModel;

    public function __construct()
    {
        $this->municipioModel = new MunicipioModel();
    }

    public function getMunicipiosByEstado($estadoId)
    {
        /*
            Retorna a lista de municípios de um estado específico.
        */
        
        try {
            $municipios = $this->municipioModel->select('id, nome')->where('ufid', $estadoId)->findAll();
            

        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Erro no BD:' . $e->getMessage()
            ];
        }

        if (empty($municipios)) {
            return [
                'status' => 'error',
                'message' => "Estado inválido"
            ];
        }

        return [
            'status' => 'success',
            'data' => $municipios
        ];
    }
}