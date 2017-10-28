<?php
require_once 'autoload.php';

class Usuarios
{
    protected $con;

    public function __construct()
    {
        $database = new Database();
        $this->con = $database->con;
    }

    public function insereUsuario($login, $senha)
    {
        $login = mysqli_real_escape_string($this->con, $login);
        $senha = md5($senha);
        $query = "INSERT INTO usuarios (login, senha) VALUES ('{$login}', '{$senha}')";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function listarUsuarios()
    {
        $query = "SELECT * FROM usuarios";
        $lista = mysqli_query($this->con, $query);
        return $lista;
    }

    public function verUsuario($id)
    {
        $query = "SELECT * FROM usuarios WHERE id = {$id}";
        $usuario = mysqli_fetch_object(mysqli_query($this->con, $query));
        return $usuario;
    }

    public function removerUsuario($id)
    {
        $query = "DELETE FROM usuarios WHERE id = {$id}";
        if(mysqli_query($this->con, $query))
            return 'true';
        else
            return 'false';
    }

    public function alterarUsuario($id, $login, $senha = null)
    {
        $login = mysqli_real_escape_string($this->con, $login);
        if($senha != null){
            $senha = md5($senha);
            $query = "UPDATE usuarios SET login='{$login}', senha='{$senha}' WHERE id={$id}";
        }else{
            $query = "UPDATE usuarios SET login='{$login}' WHERE id={$id}";
        }
        if(mysqli_query($this->con, $query))
            return true;
        else
            return false;
    }

    public function login($login, $senha)
    {
        $login = mysqli_real_escape_string($this->con, $login);
        $senha = md5($senha);
        $query = "SELECT * FROM usuarios WHERE login='{$login}' AND senha='{$senha}'";
        $usuario = mysqli_fetch_assoc(mysqli_query($this->con, $query));
        if($usuario == NULL)
            return false;
        else
            return $usuario;
    }
}
?>