<?php
require_once './filme_model.php';

class FilmeDAO {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    function cadastrar(FilmeModel $obj) {
        $query = "INSERT INTO filme (titulo, sinopse, imagem_1, imagem_2, imagem_3, imagem_4, avaliacao) VALUES(
            '{$obj->getTitulo()}', '{$obj->getSinopse()}', '{$obj->getImagem1()}', '{$obj->getImagem2()}', '{$obj->getImagem3()}', '{$obj->getImagem4()}', '{$obj->getAvaliacao()}'
        )";
        $resultado = mysqli_query($this->con, $query);
        if (!$resultado) return "Ocorreu um erro ao cadastrar ". mysqli_error($this->con);
        return true;
    }

    function listar() {
        $query = "SELECT * FROM filme";
        $resultado = mysqli_query($this->con, $query);
        if (!$resultado) return "Ocorreu um erro ao listar {mysqli_error($this->con)}";
        $lista = array();
        while($row = mysqli_fetch_object($resultado)) {
            $model = new FilmeModel();
            $model->setData($row);
            array_push($lista, $model);
        }
        return $lista;
    }

    function buscarPorId($id) {
        $query = "SELECT * FROM filme WHERE id = $id";
        $resultado = mysqli_query($this->con, $query);
        if (!$resultado) return "Ocorreu um erro ao buscar por id {mysqli_error($this->con)}";
        $obj = mysqli_fetch_object($resultado);
        $model = new FilmeModel();
        $model->setData($obj);
        return $model;
    }
}

?>