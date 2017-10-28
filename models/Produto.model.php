<?php

class Produto
{
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;

    public function __construct(array $fields = [])
    {
        $this->id = array_key_exists('id', $fields) ? $fields['id'] : null;
        $this->nome = array_key_exists('id', $fields) ? $fields['nome'] : null;
        $this->preco = array_key_exists('id', $fields) ? $fields['preco'] : null;
        $this->descricao = array_key_exists('id', $fields) ? $fields['descricao'] : null;
        $this->categoria = array_key_exists('id', $fields) ? $fields['categoria'] : null;
        $this->usado = array_key_exists('id', $fields) ? (!empty($fields['usado']) ? $fields['usado'] : 'false') : null;
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

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setUsado($usado)
    {
        $this->usado = $usado;
    }

    public function getUsado()
    {
        return $this->usado;
    }

    public function calcularDesconto($porcentagem = 0.1)
    {
        if($porcentagem > 0 && $porcentagem < 1){
            return $this->preco - ($this->preco * $porcentagem);
        }
        return $this->preco;
    }
}

?>