<?php

namespace Controller;

use Model\PostagensModel;
use Model\VO\PostagensVO;
use Model\ProjetosModel;
use Model\VO\ProjetosVO;

final class PostagensController extends Controller {

    public function list() {
        if(isset($_POST)){
            if(isset($_SESSION['projeto'])){
                unset( $_SESSION['projeto'] );
            }else{
            session_start();
            $_SESSION['projeto'] = $_POST;
            }
        }

        $ProjetosModel = new ProjetosModel();

        $model = new PostagensModel();
        $data = $model->selectPostsPerProjects(new PostagensVO());

        if(isset($_SESSION["usuario"])){
            $logged = true;
        }else{
            $logged = false;
        }

            $this->loadView("projeto_template", [
                "Postagens" => $data,
                "logado" => $logged
            ]);  
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new PostagensModel();
            $vo = new PostagensVO($id);
            $Postagem = $model->selectOne($vo);
        } else {
            $Postagem = new PostagensVO();
            $ProjetoId = $_SESSION['projeto']['id'];
        }
        $this->loadView("formPostagens", [
            "Postagem" => $Postagem,
            "ProjetoId" => $ProjetoId
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $fotoAtual = $_POST['foto_atual'];


         if (!empty($_FILES['foto']['name'])) {
            $nomeArquivo = $this->uploadFiles($_FILES['foto']); 
            unlink("uploads/" . $fotoAtual);
        } else {
            $nomeArquivo = $fotoAtual;
        }

        $vo = new PostagensVO($id, $_POST["titulo"], $_POST["descricao"], $nomeArquivo, $_POST["projeto_id"], $_POST["data_criacao"]);
        $model = new PostagensModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("Template.php");
    }

    public function remove() {
        $vo = new PostagensVO($_GET["id"], '', '', $_GET['ft']);
        $model = new PostagensModel();
        unlink("uploads/" . $vo->getFoto());
        $result = $model->delete($vo);
        

        $this->redirect("Template.php");
    }}