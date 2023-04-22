<?php

class FilmeModel implements JsonSerializable
{
    private $id;
    private $titulo;
    private $sinopse;
    private $imagem_1;
    private $imagem_2;
    private $imagem_3;
    private $imagem_4;
    private $avaliacao;

    public function __construct(
        $id = NULL,
        $titulo = NULL,
        $sinopse = NULL,
        $imagem_1 = NULL,
        $imagem_2 = NULL,
        $imagem_3 = NULL,
        $imagem_4 = NULL,
        $avaliacao = NULL
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->sinopse = $sinopse;
        $this->imagem_1 = $imagem_1;
        $this->imagem_2 = $imagem_2;
        $this->imagem_3 = $imagem_3;
        $this->imagem_4 = $imagem_4;
        $this->avaliacao = $avaliacao;
    }

    public function setData(object $obj) {
        $this->id = $obj->id;
        $this->titulo = $obj->titulo;
        $this->sinopse = $obj->sinopse;
        $this->imagem_1 = $obj->imagem_1;
        $this->imagem_2 = $obj->imagem_2;
        $this->imagem_3 = $obj->imagem_3;
        $this->imagem_4 = $obj->imagem_4;
        $this->avaliacao = $obj->avaliacao;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function getSinopse() {
        return $this->sinopse;
    }
    public function getImagem1() {
        return $this->imagem_1;
    }
    public function getImagem2() {
        return $this->imagem_2;
    }
    public function getImagem3() {
        return $this->imagem_3;
    }
    public function getImagem4() {
        return $this->imagem_4;
    }
    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function setImagem1($imagem) {
        $this->imagem_1 = $imagem;
    }
    public function setImagem2($imagem) {
        $this->imagem_2 = $imagem;
    }
    public function setImagem3($imagem) {
        $this->imagem_3 = $imagem;
    }
    public function setImagem4($imagem) {
        $this->imagem_4 = $imagem;
    }

    private function aplicaCaminhoImagem($imagem) {
        $caminhoImagem = "http://" . $_SERVER['HTTP_HOST'] . "/wikiflix/api/uploads";
        $index = strpos($imagem, "http");
        if ($index === false) $imagem = $caminhoImagem . "/" . $imagem;
        return $imagem;
    }

    public function jsonSerialize()
    {

        return [
            "id" => $this->id,
            "titulo" => $this->titulo,
            "sinopse" => $this->sinopse,
            "imagem_1" => $this->aplicaCaminhoImagem($this->imagem_1),
            "imagem_2" => $this->aplicaCaminhoImagem($this->imagem_2),
            "imagem_3" => $this->aplicaCaminhoImagem($this->imagem_3),
            "imagem_4" => $this->aplicaCaminhoImagem($this->imagem_4),
            "avaliacao" => $this->avaliacao
        ];
    }

}
