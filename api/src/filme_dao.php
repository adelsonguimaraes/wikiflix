<?php

class FilmeDAO {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    function listar() {
        $query = "SELECT * FROM filme";
        $resultado = mysqli_query($this->con, $query);
        if (!$resultado) return "Ocorreu um erro ao listar ${mysqli_error($this->con)}";
        $lista = array();
        while($row = mysqli_fetch_object($resultado)) {
            array_push($lista, $row);
        }
        return $lista;
    }

    function buscarPorId($id) {
        $query = "SELECT * FROM filme WHERE id = $id";
        $resultado = mysqli_query($this->con, $query);
        if (!$resultado) return "Ocorreu um erro ao buscar por id ${mysqli_error($this->con)}";
        $obj = mysqli_fetch_object($resultado);
        return $obj;
    }
}

?>