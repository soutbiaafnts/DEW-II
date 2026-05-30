<?php

namespace App\Controllers;

class Municipios extends BaseController
{
    public function getByEstado($estadoId)
    {
        if (!$this->request->isAJAX()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        try {
            $municipioService = service('municipio');
            $resultado = $municipioService->getMunicipiosByEstado($estadoId);
            return $this->response->setJSON($resultado);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Erro no servidor: ' . $e->getMessage()
            ]);
        }
    }
}