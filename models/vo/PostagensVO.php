<?php

namespace Model\VO;

final class PostagensVO extends VO {

    private $titulo;
    private $descricao;
    private $foto;

    public function __construct($id = 0, $titulo = "", $descricao = "", $foto = "") {
        parent::__construct($id);
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->foto = $foto;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

}