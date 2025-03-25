<?php

namespace Model\VO;

final class UsuarioVO extends VO {
    
    private $login;
    private $senha;
    private $nivel;
    private $email;
    private $cpf;
    private $ocupacao;
    
    public function __construct($id = 0, $login = "", $senha = "", $nivel = "", $email = "", $cpf = "", $ocupacao = ""){
        parent::__construct($id);
        $this->login = $login;
        $this->senha = $senha;
        $this->nivel = $nivel;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->ocupacao = $ocupacao;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getNivel() {
        return $this->nivel;
    }
    public function setNivel($nivel) {
        $this->nivel = $nivel;
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
