<?php

namespace App\Services;

class CEPService {
    public function consultaCEP (string $cep) {

        $url = "https://brasilapi.com.br/api/cep/v2/{$cep}";
        
        // faz requisição http à API externa, com tratamento de exceções
        try {
            $client = service("curlrequest");
            
            $response = $client->get($url);

            $data = json_decode( $response->getBody(), true ); // true é usado para retornar array assossiativo

            return [
                "status" => "success",
                'data' => $data
            ];
        } catch (\Exception $e) {
            return [
                "status" => "error",
                "msg" => $e->getMessage()
            ];
        }
    }
}