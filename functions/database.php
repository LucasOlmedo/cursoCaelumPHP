<?php

class operacoesDB
{
    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'root', 'caelum', 'loja');
    }
}
?>