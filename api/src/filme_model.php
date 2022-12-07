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
        $imagem_4 = NULL
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->sinopse = $sinopse;
        $this->image_1 = $imagem_1;
        $this->image_2 = $imagem_2;
        $this->image_3 = $imagem_3;
        $this->image_4 = $imagem_4;
    }

    public function jsonSerialize()
    {
         return [
            "id" => $this->id,
            "titulo" => $this->titulo,
            "sinopse" => $this->sinopse,
            "imagem_1" => $this->imagem_1,
            "imagem_2" => $this->imagem_2,
            "imagem_3" => $this->imagem_3,
            "imagem_4" => $this->imagem_4,
            "avaliacao" => $this->avaliacao
         ];
    }

}
