<?php

    class Carta{
       
        private bool $status;
        private array $imagem;      
    

        //Construtor
        function __construct(string $imagem)
        {
        
            $this->status = 1;
            $this->imagem = $imagem;

        }



        public function getStatus()
        {
            return $this->status;
        }

        public function getImagem()
        {
            return $this->imagem;
        }
        
        public function setStatus(int $status)
        {
            return $this->status = $status; 
        }
        
        //Função para virar a carta
        public function virarCarta()
        {
            $this->imagem = $this->status ? 0 : 1;
            $this->setStatus(1);
        }
        
        //Função para desvirar a carta
        public function desvirarCarta()
        {
            $this->imagem = $this->status ? 1: 0;
            $this->setStatus(0);
        }


    }
