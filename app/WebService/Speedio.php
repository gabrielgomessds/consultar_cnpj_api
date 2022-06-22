<?php

namespace App\WebService;


class Speedio
{
    //URL base da api do Speedio
    const URL_BASE = 'https://api-publica.speedio.com.br';
    
    //Metodo reponsavel por consultar o CPNJ
    public function consultarCnpj( string $cnpj): array
    {
        //remove os caracteres
        $cnpj = preg_replace('/\D/', '', $cnpj);

        //Retorna a consulta
        return $this->get('/buscarcnpj?cnpj='.$cnpj);
    }

    //Metodo que irá consultar as apis
    public function get(string $resource)
    {
        $endpoint = self::URL_BASE.$resource;
        
        //Iniciando o Curl
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //executa a requisição
        $response = curl_exec($curl);

        curl_close($curl);

        //RESPONSE EM ARRAY

        $responseArray = json_decode($response, true);

        //Retornar o array com os dados
        return is_array($responseArray) ? $responseArray : [];
    }
}