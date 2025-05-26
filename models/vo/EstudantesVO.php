<?php

namespace Model\VO;

final class EstudantesVO extends VO {
    
    private $curso_id;
    private $nome;
    private $email;
    private $cpf;
    private $ocupacao;
    
    public function __construct($id = 0, $curso_id = 0, $nome = "", $cpf = "", $email = "", $ocupacao = ""){
        parent::__construct($id);
        $this->curso_id = $curso_id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->ocupacao = $ocupacao;
    }

    public function getCursoId(){
        return $this->curso_id;
    }
    public function setCursoId($curso_id){
        $this->curso_id = $curso_id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getOcupacao(){
        return $this->ocupacao;
    }
    public function setOcupacao($ocupacao){
        $this->ocupacao = $ocupacao;
    }
}
