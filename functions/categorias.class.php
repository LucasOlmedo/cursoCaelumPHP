<?php
require_once 'database.php';

class Categorias
{
    protected $con;

    public function __construct()
    {
        $database = new operacoesDB();
        $this->con = $database->con;
    }

    public function insereCategoria($nome)
    {
        $nome = mysqli_real_escape_string($this->con, $nome);
        $query = "INSERT INTO categorias (nome) VALUES ('{$nome}')";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function listarCategorias()
    {
        $query = "SELECT * FROM categorias";
        $lista = mysqli_query($this->con, $query);
        return $lista;
    }

    public function verCategoria($id)
    {
        $query = "SELECT * FROM categorias WHERE id = {$id}";
        $categoria = mysqli_fetch_object(mysqli_query($this->con, $query));
        return $categoria;
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

    public function alterarCategoria($id, $nome)
    {
        $nome = mysqli_real_escape_string($this->con, $nome);
        $query = "UPDATE categorias SET nome='{$nome}' WHERE id={$id}";
        if(mysqli_query($this->con, $query)){
            return true;
        }else{
            return false;
        }
    }
}
?>