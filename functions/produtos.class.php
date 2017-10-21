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
        $produto->setNome(mysqli_real_escape_string($this->con, $produto->getNome()));
        $produto->setDescricao(mysqli_real_escape_string($this->con, $produto->getDescricao()));
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()}, {$produto->getUsado()})";
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
            $newProduto->setId($produto['id']);
            $newProduto->setNome($produto['nome']);
            $newProduto->setPreco($produto['preco']);
            $newProduto->setDescricao($produto['descricao']);
            $newProduto->setUsado($produto['usado']);
            $newProduto->setCategoria(new CategoriaModel);
            $newProduto->getCategoria()->setId($produto['categoria_id']);
            $newProduto->getCategoria()->setNome($produto['nome_categoria']);
            array_push($arrayProduto, $newProduto);
        }
        return $arrayProduto;
    }

    public function verProduto($id)
    {
        $query = "SELECT p.*, c.nome AS nome_categoria FROM produtos AS p LEFT JOIN categorias AS c ON c.id = p.categoria_id WHERE p.id = {$id}";
        $produto = mysqli_fetch_object(mysqli_query($this->con, $query));
        $newProduto = new ProdutoModel;
        $newProduto->setId($produto->id);
        $newProduto->setNome($produto->nome);
        $newProduto->setPreco($produto->preco);
        $newProduto->setDescricao($produto->descricao);
        $newProduto->setUsado($produto->usado);
        $newProduto->setCategoria(new CategoriaModel);
        $newProduto->getCategoria()->setId($produto->categoria_id);
        $newProduto->getCategoria()->setNome($produto->nome_categoria);
        return $newProduto;
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
        $produto->setNome(mysqli_real_escape_string($this->con, $produto->getNome()));
        $produto->setDescricao(mysqli_real_escape_string($this->con, $produto->getDescricao()));
        $query = "UPDATE produtos SET nome='{$produto->getNome()}', preco={$produto->getPreco()}, descricao='{$produto->getDescricao()}', categoria_id={$produto->getCategoria()}, usado={$produto->getUsado()} WHERE id={$id}";
        if(mysqli_query($this->con, $query)){
            return true;
        }else{
            return false;
        }
    }
}
?>