<?php
require_once 'autoload.php';

class CategoriaDAO
{
    protected $con;

    public function __construct()
    {
        $database = new Database();
        $this->con = $database->con;
    }

    public function insereCategoria($categoria)
    {
        $categoria->setNome(mysqli_real_escape_string($this->con, $categoria->getNome()));
        $query = "INSERT INTO categorias (nome) VALUES ('{$categoria->getNome()}')";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function listarCategorias()
    {
        $arrayCategoria = [];
        $query = "SELECT * FROM categorias";
        $lista = mysqli_query($this->con, $query);
        while ($categoria = mysqli_fetch_assoc($lista)) {
            $newCategoria = new Categoria;
            $newCategoria->setId($categoria['id']);
            $newCategoria->setNome($categoria['nome']);
            array_push($arrayCategoria, $newCategoria);
        }
        return $arrayCategoria;
    }

    public function verCategoria($id)
    {
        $query = "SELECT * FROM categorias WHERE id = {$id}";
        $categoria = mysqli_fetch_object(mysqli_query($this->con, $query));
        $newCategoria = new Categoria;
        $newCategoria->setId($categoria->id);
        $newCategoria->setNome($categoria->nome);
        return $newCategoria;
    }

    public function removerCategoria($id)
    {
        $query = "DELETE FROM categorias WHERE id = {$id}";
        if(mysqli_query($this->con, $query)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function alterarCategoria($id, $categoria)
    {
        $categoria->setNome(mysqli_real_escape_string($this->con, $categoria->getNome()));
        $query = "UPDATE categorias SET nome='{$categoria->getNome()}' WHERE id={$id}";
        if(mysqli_query($this->con, $query)){
            return true;
        }else{
            return false;
        }
    }
}
?>