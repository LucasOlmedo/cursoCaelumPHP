<?php
require_once 'database.php';

class Produtos
{
    protected $con;

    public function __construct()
    {
        $database = new operacoesDB();
        $this->con = $database->con;
    }

    public function insereProdutos($produto)
    {
        $produto->nome = mysqli_real_escape_string($this->con, $produto->nome);
        $produto->descricao = mysqli_real_escape_string($this->con, $produto->descricao);
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoriaId}, {$produto->usado})";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function listarProdutos()
    {
        $query = "SELECT p.*, c.nome AS nome_categoria FROM produtos AS p LEFT JOIN categorias AS c ON c.id = p.categoria_id";
        $lista = mysqli_query($this->con, $query);
        return $lista;
    }

    public function verProduto($id)
    {
        $query = "SELECT p.*, c.nome AS nome_categoria FROM produtos AS p LEFT JOIN categorias AS c ON c.id = p.categoria_id WHERE p.id = {$id}";
        $produto = mysqli_fetch_object(mysqli_query($this->con, $query));
        return $produto;
    }

    public function removerProduto($id)
    {
        $query = "DELETE FROM produtos WHERE id = {$id}";
        if(mysqli_query($this->con, $query)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function alterarProduto($id, $nome, $preco, $descricao, $categoria_id, $usado = false)
    {
        $nome = mysqli_real_escape_string($this->con, $nome);
        $descricao = mysqli_real_escape_string($this->con, $descricao);
        $query = "UPDATE produtos SET nome='{$nome}', preco={$preco}, descricao='{$descricao}', categoria_id={$categoria_id}, usado={$usado} WHERE id={$id}";
        if(mysqli_query($this->con, $query)){
            return true;
        }else{
            return false;
        }
    }
}
?>