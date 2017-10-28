<?php
require_once 'autoload.php';

class ProdutoDAO
{
    protected $con;

    public function __construct()
    {
        $database = new Database();
        $this->con = $database->con;
    }

    public function insereProdutos($produto)
    {
        if($produto->temISBN()){
            $isbn = $produto->getIsbn();
        }else{
            $isbn = '';
        }

        $produto->setNome(mysqli_real_escape_string($this->con, $produto->getNome()));
        $produto->setDescricao(mysqli_real_escape_string($this->con, $produto->getDescricao()));
        $query = "INSERT INTO produtos 
                (
                    nome, 
                    preco, 
                    descricao, 
                    categoria_id, 
                    usado, 
                    isbn
                ) 
                VALUES (
                    '{$produto->getNome()}', 
                    {$produto->getPreco()}, 
                    '{$produto->getDescricao()}', 
                    {$produto->getCategoria()}, 
                    {$produto->getUsado()}, 
                    '{$isbn}'
                )";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function listarProdutos()
    {
        $arrayProduto = [];
        $query = "SELECT p.*, c.nome AS nome_categoria 
                    FROM produtos AS p 
                    LEFT JOIN categorias AS c ON c.id = p.categoria_id";
        $lista = mysqli_query($this->con, $query);
        while ($produto = mysqli_fetch_assoc($lista)) {
            if(trim($produto['isbn']) !== '' && trim($produto['isbn']) !== NULL){
                $newProduto = new Livro;
                $newProduto->setIsbn($produto['isbn']);
            }else{
                $newProduto = new Produto;
            }
            $newProduto->setId($produto['id']);
            $newProduto->setNome($produto['nome']);
            $newProduto->setPreco($produto['preco']);
            $newProduto->setDescricao($produto['descricao']);
            $newProduto->setUsado($produto['usado']);
            $newProduto->setCategoria(new Categoria);
            $newProduto->getCategoria()->setId($produto['categoria_id']);
            $newProduto->getCategoria()->setNome($produto['nome_categoria']);
            array_push($arrayProduto, $newProduto);
        }
        return $arrayProduto;
    }

    public function verProduto($id)
    {
        $query = "SELECT p.*, c.nome AS nome_categoria 
                    FROM produtos AS p 
                    LEFT JOIN categorias AS c ON c.id = p.categoria_id 
                WHERE p.id = {$id}";
        $produto = mysqli_fetch_assoc(mysqli_query($this->con, $query));

        if($produto['isbn'] !== '' && $produto['isbn'] !== NULL){
            $newProduto = new Livro;
            $newProduto->setIsbn($produto['isbn']);
        }else{
            $newProduto = new Produto;
        }

        $newProduto->setId($produto['id']);
        $newProduto->setNome($produto['nome']);
        $newProduto->setPreco($produto['preco']);
        $newProduto->setDescricao($produto['descricao']);
        $newProduto->setUsado($produto['usado']);
        $newProduto->setCategoria(new Categoria);
        $newProduto->getCategoria()->setId($produto['categoria_id']);
        $newProduto->getCategoria()->setNome($produto['nome_categoria']);
        return $newProduto;
    }

    public function removerProduto($id)
    {
        $query = "DELETE FROM produtos 
                    WHERE id = {$id}";
        if(mysqli_query($this->con, $query)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function alterarProduto($id, $produto)
    {
        if($produto->temISBN()){
            $isbn = $produto->getIsbn();
        }else{
            $isbn = '';
        }

        $produto->setNome(mysqli_real_escape_string($this->con, $produto->getNome()));
        $produto->setDescricao(mysqli_real_escape_string($this->con, $produto->getDescricao()));
        $query = "UPDATE produtos SET 
                    nome='{$produto->getNome()}',
                    preco={$produto->getPreco()},
                    descricao='{$produto->getDescricao()}',
                    categoria_id={$produto->getCategoria()},
                    usado={$produto->getUsado()},
                    isbn='{$isbn}'
                WHERE id={$id}";
        if(mysqli_query($this->con, $query)){
            return true;
        }else{
            return false;
        }
    }
}
?>