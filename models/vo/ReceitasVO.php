<?php

namespace Model\VO;

final class ReceitasVO extends VO {

    private $titulo;
    private $descricao;
    private $ingredientes;
    private $modo_preparo;
    private $tempo_preparo;
    private $rendimento;
    private $categoria;
    private $imagem;
    private $data_criacao;

    public function __construct($id = 0, $titulo = "", $descricao = "", $ingredientes = "", $modo_preparo = "", $tempo_preparo = 0, $rendimento = "", $categoria = "", $imagem = "", $data_criacao = '') {
        parent::__construct($id);
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->ingredientes = $ingredientes;
        $this->modo_preparo = $modo_preparo;
        $this->tempo_preparo = $tempo_preparo;
        $this->rendimento = $rendimento;
        $this->categoria = $categoria;
        $this->imagem = $imagem;
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

    public function getIngredientes() {
        return $this->ingredientes;
    }

    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

    public function getModoPreparo() {
        return $this->modo_preparo;
    }

    public function setModoPreparo($modo_preparo) {
        $this->modo_preparo = $modo_preparo;
    }

    public function getTempoPreparo() {
        return $this->tempo_preparo;
    }

    public function setTempoPreparo($tempo_preparo) {
        $this->tempo_preparo = $tempo_preparo;
    }

    public function getRendimento() {
        return $this->rendimento;
    }

    public function setRendimento($rendimento) {
        $this->rendimento = $rendimento;
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

    public function getDataCriacao() {
        return $this->data_criacao;
    }

    public function setDataCriacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }

}