<?php

namespace App\View;

class Renderiza
{
    public function renderizarHtml(string $caminho, array $dados):string
    {

        //Extrair variaveis do array
        extract($dados);
        //Iniciar buffer de saida para guardar o conteudo do html
        ob_start();
        //Require do arquivo html
        require __DIR__.'/../../' . $caminho;
        //Pegar o HTML que está no buffer depois limpa-lo
        $html = ob_get_clean();

        //Retornar o HTML
        return $html;

    }
}