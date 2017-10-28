<?php

class Categoria
{
    private $id;
    private $nome;

    public function __construct(array $fields = [])
    {
        $this->id = array_key_exists('id', $fields) ? $fields['id'] : null;
        $this->nome = array_key_exists('id', $fields) ? $fields['nome'] : null;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
}

?>