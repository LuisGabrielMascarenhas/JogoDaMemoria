<?php

    class Carta{
       
        private bool $status;
        private string $imagem;      
    

        //Construtor
        function __construct(string $imagem)
        {
        
            $this->status = false;
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
        
        //Função para virar a carta
        public function virarCarta()
        {
            $this->status = $this->status ? false : true;
          
        }
        
        //Função para desvirar a carta
        public function desvirarCarta()
        {
            $this->status = true;
          
        }


    }
