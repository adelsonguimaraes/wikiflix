<?php

require_once './../conexao.php';
require_once './filme_model.php';
require_once './filme_dao.php';

class FilmeControl {
    protected $con;
    protected $obj;
    protected $dao;

    public function __construct(FilmeModel $obj=NULL) {
        $this->con = Conexao::getInstance()->getConexao();
        $this->dao = new FilmeDAO($this->con);
        $this->obj = $obj;
    }

    function cadastrar($obj) {
        return $this->dao->cadastrar($obj);
    }

    function listar() {
        return $this->dao->listar();
    }

    function buscarPorId($id) {
        return $this->dao->buscarPorId($id);
    }
}

?>