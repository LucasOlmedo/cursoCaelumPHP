<?php

class ProdutoModel
{
    public $id;
    public $nome;
    public $preco;
    public $descricao;
    public $categoriaId;
    public $usado;

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

    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    public function setUsado($usado)
    {
        $this->usado = $usado;
    }

    public function getUsado()
    {
        return $this->usado;
    }
}

?>