<?php
namespace Loteria\Lib;

class Sorteados
{
    private $bilhetes = [];
    private $dezenasSorteadas = [];
    private $numDezenas = 6;

    /**
     * Define os bilhetes gerados do usuario
     *
     * @param array $bilhetes
     * @return Sorteados
     */
    public function setBilhetes(array $bilhetes): self
    {
        $this->bilhetes = $bilhetes;
        return $this;
    }

    /**
     * Define as dezenas sorteadas
     *
     * @param array $dezenasSorteadas Array com as dezenas sorteadas exemplo: [10,20,45,55,57,58]
     * @return Sorteados
     */
    public function setDezenasSorteadas(array $dezenasSorteadas): self
    {
        $this->dezenasSorteadas = $dezenasSorteadas;
        $this->numDezenas = count($dezenasSorteadas);
        return $this;
    }

    private function checkBilhete(array $bilhete): \stdClass
    {   
        if(empty($this->dezenasSorteadas)) {
            throw new \Exception('Deve ser informado as dezenas sorteadas');
        }
        $dezenas = [];
        $dezenasSorteadas = 0;
        $premiado = false;
        foreach($bilhete as $dezena) {
            if(in_array($dezena, $this->dezenasSorteadas)) {    
                $dezenas[] = ['dezena' => $dezena, 'sorteada' => true];
                $dezenasSorteadas++;
                if($dezenasSorteadas == $this->numDezenas) {
                    $premiado = true;
                }
            } else {
                $dezenas[] = ['dezena' => $dezena, 'sorteada' => false];
            }
        }

        return (object)['dezenas' => $dezenas, 'premiado' => $premiado, 'dezenasSorteadas' => $dezenasSorteadas];
    }

    /**
     * Traz os bilhetes com as dezenas premiadas ou não
     *
     * @return array
     */
    public function getBilhetes(): array
    {
        if(empty($this->bilhetes)) {
            throw new \Exception('Deve ser informado os bilhetes gerados');
        }
        $result = [];
        $bilhetes = $this->bilhetes;

        foreach($bilhetes as $bilhete) {
            $result[] = $this->checkBilhete($bilhete);
        }
        return $result;
    }
}