<?php

namespace Model\VO;

final class PostagensVO extends VO {

    private $titulo;
    private $descricao;
    private $foto;
    private $projeto_id;
    private $data_criacao;

    public function __construct($id = 0, $titulo = "", $descricao = "", $foto = "", $projeto_id = 0, $data_criacao = '') {
        parent::__construct($id);
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->foto = $foto;
        $this->projeto_id = $projeto_id;
        $this->data_criacao = $data_criacao;
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

    public function getProjetoId() {
        return $this->projeto_id;
    }

    public function setProjetoId($projeto_id) {
        $this->projeto_id = $projeto_id;
    }

    public function getDataCriacao() {
        return $this->data_criacao;
    }

    public function setDataCriacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }

}