<?php

    class Carta{
       /*  private int $id; */
        private bool $status;
        private array $imagem = array(
            'assets/abobora.png',
            'assets/fantasma.png',
        );       
        private string $imagemVirada = 'assets/interogacao.png';
    


        //Construtor
        function __construct(/* $id,*/$status,$imagem)
        {
            /* $this->id= $id; */
            $this->status = $status;
            $this->imagem = $imagem;
            $this->virarCarta();
            $this->desvirarCarta();

        }


        function criarHtml($imagem){
            foreach ($imagem as $imagens){
                $this->imagem .= $imagens ? "<div class='card'><img src='{$imagens}' style='width:100%'> </div>": "<div class='card'><img src='{$imagens}' style='width:100%'> </div>";
    
            }
        
        }
      

        /* public function getId(){
            return $this->id;
        } */

        public function getStatus()
        {
            return $this->status;
        }

        public function getImagem()
        {
            return $this->imagem;
        }

        public function getImagemVirada()
        {
            return $this->imagemVirada;
        }
        
        public function setStatus($status)
        {
            return $this->status = $status; 
        }
        
        //Função para virar a carta
        public function virarCarta()
        {
            $this->imagemVirada = $this->imagem;
            $this->setStatus(1);
        }
        
        //Função para desvirar a carta
        public function desvirarCarta()
        {
            $this->imagem = $this->imagemVirada;
            $this->setStatus(0);
        }


    }
