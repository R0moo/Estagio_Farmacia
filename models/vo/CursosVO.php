<?php

namespace Model\VO;

final class ReceitasVO extends VO {

    private $estudantes_id;
    private $avaliacao_id;    
    private $titulo;
    private $resumo;
    private $vagas;
    private $materiais;
    private $carga_horaria;
    private $data_inicio;
    private $data_fim;
    private $imagem;

    public function __construct($id = 0, $estudantes_id = 0, $avaliacao_id = 0, $titulo = "", $resumo = "", $vagas = 0, $materiais = "", $carga_horaria = 0, $data_inicio = "", $data_fim = '', $imagem = '') {
        parent::__construct($id);
        $this->estudantes_id = $estudantes_id;
        $this->avaliacao_id = $avaliacao_id;
        $this->titulo = $titulo;
        $this->resumo = $resumo;
        $this->vagas = $vagas;
        $this->materiais = $materiais;
        $this->carga_horaria = $carga_horaria;
        $this->data_inicio = $data_inicio;
        $this->data_fim = $data_fim;
        $this->imagem = $imagem;
        
    }

    public function getEstudantesId() {
        return $this->estudantes_id;
    }

    public function setEstudantesId($estudantes_id) {
        $this->estudantes_Id = $estudantes_id;
    }

    public function getAvaliacaoId() {
        return $this->avaliacao_id;
    }

    public function setAvaliacaoId($avaliacao_id) {
        $this->avaliacao_id = $avaliacao_id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getResumo() {
        return $this->resumo;
    }

    public function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    public function getVagas() {
        return $this->vagas;
    }

    public function setVagas($vagas) {
        $this->vagas = $vagas;
    }

    public function getMateriais() {
        return $this->materiais;
    }

    public function setMateriais($materiais) {
        $this->materiais = $materiais;
    }

    public function getCargaHoraria() {
        return $this->carga_horaria;
    }

    public function setCargaHoraria($carga_horaria) {
        $this->carga_horaria = $carga_horaria;
    }

    public function getdata_inicio() {
        return $this->data_inicio;
    }

    public function setdata_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getDatafim() {
        return $this->data_fim;
    }

    public function setDatafim($data_fim) {
        $this->data_fim = $data_fim;
    }

}