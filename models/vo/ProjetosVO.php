<?php

namespace Model\VO;

final class ProjetosVO extends VO {

    private $titulo;
    private $descricao;
    private $capa;
    private $cor1;
    private $cor2;

    public function __construct($id = 0, $titulo = "", $descricao = "", $capa = "", $cor1 = "", $cor2 = "") {
        parent::__construct($id);
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->capa = $capa;
        $this->cor1 = $cor1;
        $this->cor2 = $cor2;
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

    public function getCapa() {
        return $this->capa;
    }

    public function setCapa($capa) {
        $this->capa = $capa;
    }

    public function getCor1() {
        return $this->cor1;
    }

    public function setCor1($cor1) {
        $this->cor1 = $cor1;
    }

    public function getCor2() {
        return $this->cor2;
    }

    public function setCor2($cor2) {
        $this->cor2 = $cor2;
    }

}