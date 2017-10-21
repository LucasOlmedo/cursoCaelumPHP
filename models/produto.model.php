<?php

class ProdutoModel
{
    public $id;
    public $nome;
    public $preco;
    public $descricao;
    public $categoria;
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