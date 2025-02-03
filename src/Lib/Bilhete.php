<?php
namespace Loteria\Lib;

class Bilhete
{
    private $bilhetes = [];
    private int $quatidadeBilhetes = 1;
    private int $dezenas = 6;

    /**
     * Define a quantidade de dezenas
     *
     * @param integer $dezenas Quantidade de dezenas do bilhete.Entre 6 e 10 dezenas
     * @return Bilhete
     */
    public function setDezenas(int $dezenas): Bilhete
    {
        $this->dezenas = $dezenas;
        return $this;
    }

    /**
     * Define a quantidade de bilhetes.
     *
     * @param integer $quatidadeBilhetes Quantidade de bilhetes. de 1 a 50.
     * @return Bilhete
     */
    public function setQuantidadeBilhetes(int $quatidadeBilhetes): Bilhete
    {
        $this->quatidadeBilhetes = $quatidadeBilhetes;
        return $this;
    }

    /**
     * Gerar um bilhete com dezenas aleatórias
     *
     * @param integer $dezenas Quantidade de dezenas do bilhete.Entre 6 e 10 dezenas
     * @return array
     */
    public static function gerarBilheteAleatorio(int $dezenas): array
    {
        if($dezenas < 6 || $dezenas > 10) {
            throw new \Exception('Deve conter de 6 a 10 dezenas');
        }
        $result = [];
        
        while(count($result) < $dezenas) {
            $dezena = random_int(1, 60);
            if(!in_array($dezena, $result)) { $result[] = $dezena; }
        }

        sort($result);
        return $result;
    }

    /**
     * Gera os bilhetes com base na quantidade informada
     *
     * @return array
     */
    public function gerarBilhetes(): array
    {
        if($this->quatidadeBilhetes < 1) {
            throw new \Exception('Você deve gerar pelo menos 1 bilhete');
        }
        if($this->quatidadeBilhetes > 50) {
            throw new \Exception('Pode ser gerado até 50 bilhetes por vez');
        }
        $this->bilhetes = [];

        for($i = 0; $i < $this->quatidadeBilhetes; $i++) {
            $this->bilhetes[] = Bilhete::gerarBilheteAleatorio($this->dezenas);
        }

        return $this->bilhetes;
    }
}