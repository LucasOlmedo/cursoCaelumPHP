<?php
require_once 'database.php';
require_once 'models/produto.model.php';
require_once 'models/categoria.model.php';

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
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria}, {$produto->usado})";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function listarProdutos()
    {
        $arrayProduto = [];
        $query = "SELECT p.*, c.nome AS nome_categoria FROM produtos AS p LEFT JOIN categorias AS c ON c.id = p.categoria_id";
        $lista = mysqli_query($this->con, $query);
        while ($produto = mysqli_fetch_assoc($lista)) {
            $newProduto = new ProdutoModel;
            $newProduto->id = $produto['id'];
            $newProduto->nome = $produto['nome'];
            $newProduto->preco = $produto['preco'];
            $newProduto->descricao = $produto['descricao'];
            $newProduto->usado = $produto['usado'];
            $newProduto->categoria = new CategoriaModel;
            $newProduto->categoria->id = $produto['categoria_id'];
            $newProduto->categoria->nome = $produto['nome_categoria'];
            array_push($arrayProduto, $newProduto);
        }
        return $arrayProduto;
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

    public function alterarProduto($id, $produto)
    {
        $produto->nome = mysqli_real_escape_string($this->con, $produto->nome);
        $produto->descricao = mysqli_real_escape_string($this->con, $produto->descricao);
        $query = "UPDATE produtos SET nome='{$produto->nome}', preco={$produto->preco}, descricao='{$produto->descricao}', categoria_id={$produto->categoria}, usado={$produto->usado} WHERE id={$id}";
        if(mysqli_query($this->con, $query)){
            return true;
        }else{
            return false;
        }
    }
}
?>