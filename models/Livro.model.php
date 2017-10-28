<?php

class Livro extends Produto
{
    private $isbn;

    public function __construct(array $fields = [])
    {
        parent::__construct($fields);
        $this->isbn = array_key_exists('isbn', $fields) ? $fields['isbn'] : null;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function calcularImposto() {
        return $this->getPreco() * 0.065;
    }
}

?>