<?php 
    // Classe PHP usada para retorno de respostas
    class Resposta{
        public $status;
        public $msg;

        function __construct($status, $msg){
            $this->status = $status;
            $this->msg = $msg;
        }
    }
