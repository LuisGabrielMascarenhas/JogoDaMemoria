<?php

class JogoMemoria
{
    private array $jogo;
    private array $imagem = array(
        'assets/abobora.png',
        'assets/fantasma.png',
    );

    public int $erros = 0;
    public int $acertos = 0;
    public string $html;
    public string $htmlPontos;

    public function __construct(array $cartasAntigas = null, int $erros = null, int $acertos = null)
    {
        include_once 'Card.php';
        if (!isset($cartasAntigas)) {
            $this->jogo = array();

            $imagem = array_merge($this->imagem, $this->imagem);

            foreach ($imagem as $imagens) {
                $this->jogo[] = new Carta($imagens);
            }
            shuffle($this->jogo);
        } else {
            $this->jogo = $cartasAntigas;
            $this->erros = $erros;
            $this->acertos = $acertos;
        }
        $this->erros < 8 && $this->acertos < count($this->imagem) ? $this->gerarHtmlJogo() : $this->htmlIntocavel();
        $this->htmlPontos();
    }
    public function getJogo()
    {
        return $this->jogo;
    }

    public function getErros()
    {
        return $this->erros;
    }

    public function getAcertos()
    {
        return $this->acertos;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function gethtmlPontos()
    {
        return $this->htmlPontos;
    }

    public function getQtdImg()
    {
        return count($this->imagem);
    }

    public function analisar(int $posicaoCarta, int $posicaoCarta2)
    {
        if ($this->pegarCarta($posicaoCarta) == $this->pegarCarta($posicaoCarta2)) {
            $this->acertos++;
            return true;
        } else {
            $this->virarCarta($posicaoCarta);
            $this->virarCarta($posicaoCarta2);
            $this->erros++;
            return false;
        }
    }


    public function virarCarta($status)
    {
        $this->jogo[$status]->virar();
    }
    public function pegarCarta($status)
    {
       $this->jogo[$status]->getCarta();
    }

    public function gerarHtmlJogo()
    {
        $this->html = "";
        foreach ($this->jogo as $posicao => $carta) {
            if ($carta->getStatus()) {
                $this->html .= "
                <img src='assets/{$carta->getImagem()}' alt='{$carta->getImagem()}'>";
            } else {
                $this->html .= "<button type='submit' name='carta' value='{$posicao}'>
                <img src='assets/interrogacao.jpg' alt='interrogacao.png'></button>";
            }
        }
    }
    public function htmlIntocavel()
    {
        $this->html = "";
        foreach ($this->jogo as $carta) {
            $carta->desvirarCarta();
            $img = $carta->getImagem();
            $this->html .= "<img src='assets/{$img}' alt='{$img}'>";
        }
    }

    public function htmlPontos()
    {
        $this->htmlPontos = "<p>Erros: {$this->erros}/8 - Acertos: {$this->acertos}/" . count($this->imagem) . "</p>";

        if ($this->erros > 7) {
            $this->htmlPontos .= "<p>Você Perdeu!</p>";
        }

        if ($this->acertos == count($this->imagem)) {
            $this->htmlPontos .= "<p>Você ganhou!</p>";
        }

        $this->htmlPontos .= "<button onclick=\"reiniciarJogo()\">Reiniciar Jogo</button>";

        $this->html .= $this->htmlPontos;
    }
}
