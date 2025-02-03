<?php

namespace Loteria\Controller;

use Klein\Response;
use Loteria\Lib\Controller;
use Loteria\Lib\Bilhete;
use Loteria\Lib\Sorteados;

class BilhetesController extends Controller
{
    public function gerarBilhetes(): Response
    {
        try {
            $dezenas    = intval($this->request->dezenas);
            $quantidade = intval($this->request->quantidade);


            if($dezenas < 6 || $dezenas > 10) {
                throw new \Exception("Deve conter de 6 a 10 dezenas");
            }
            if($quantidade < 1 || $quantidade > 50) {
                throw new \Exception("Pode ser gerado no mínimo 1 e no máximo 50 bilhetes por vez");
            }
            
            $bilhete = new Bilhete();
            $sorteados = new Sorteados();
            
            $bilhete->setDezenas($dezenas);
            $bilhete->setQuantidadeBilhetes($quantidade);
            $bilhetesGerados = $bilhete->gerarBilhetes();

            
            $dezenasSorteadas = Bilhete::gerarBilheteAleatorio(6);
            // $bilhetesGerados[] = $dezenasSorteadas; // Teste premiado
            $sorteados->setBilhetes($bilhetesGerados);
            $sorteados->setDezenasSorteadas($dezenasSorteadas);
            $bilhetes = $sorteados->getBilhetes();
            
            
            return $this->view('gerar_bilhetes', [
                'bilhetes'        => $bilhetes,
                'bilhetePremiado' => $dezenasSorteadas
            ], 'vazio');
        } catch (\Throwable $th) {
            $this->onError(400, $th, 'error-exception', [], 'vazio');
        }
    }
}