<?php

namespace Controller;

abstract class Controller {

    public function __construct($obrigaLogin = false){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if($obrigaLogin) {
            if(!isset($_SESSION["usuario"])) {
                $this->redirect("login.php");
                exit;
            }
        }        
    }

    public function redirect($url) {
        header("Location: " . $url);
        exit; // Adicionar exit após redirecionar
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/" . $view . ".php");
    }

    public function uploadFiles($file) {
        if (empty($file["name"])) {
            return "";
        }
        
        $extensao = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $extensao;
        move_uploaded_file($file['tmp_name'], "uploads/" . $nomeArquivo);

        return $nomeArquivo;
    }

    public function IsLogged(){
        if(!isset($_SESSION["usuario"])){
            $this->redirect("login.php");
            exit;
        }
    }
}