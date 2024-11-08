<?php
// Classe PHP para instanciar usuários
class Usuario
{
    public $nome;
    public $email;
    public $senha;

    // Construtor para inicializar as propriedades
    public function __construct($nome, $email, $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }
}
