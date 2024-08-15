<?php 
    class Usuario{
        public $nome_user;
        public $email_user;
        public $senha_user;

        function __construct($nome, $email, $senha){
            $this->nome_user = $nome;
            $this->email_user = $email;
            $this->senha_user = $senha;
        }
    }