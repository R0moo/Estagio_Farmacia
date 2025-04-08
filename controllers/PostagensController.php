<?php

namespace Controller;

use Model\PostagensModel;
use Model\VO\PostagensVO;
use Model\ProjetosModel;
use Model\VO\ProjetosVO;

final class PostagensController extends Controller {

    public function list() {
        if (!empty($_GET['id'])) {
            $idProjeto = $_GET['id'];
    
            $projetoVO = new ProjetosVO();
            $projetoVO->setId($idProjeto);
    
            $modelProjeto = new ProjetosModel();
            $projetoCompleto = $modelProjeto->selectOne($projetoVO);

            $_SESSION['projeto'] = $projetoCompleto;
        }
    
        $project = $_SESSION['projeto'] ?? null;
    
        $modelPostagens = new PostagensModel();
        $data = $modelPostagens->selectAll(new PostagensVO());
    
        $logged = isset($_SESSION["usuario"]);
    
        $this->loadView("projeto_template", [
            "Postagens" => $data,
            "logado" => $logged,
            "projeto" => $project
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;
        $ProjetoId = $_SESSION['projeto']->getId() ?? null; // Verificar se ProjetoId está definido

        if(!empty($id)) {
            $model = new PostagensModel();
            $vo = new PostagensVO($id);
            $Postagem = $model->selectOne($vo);
        } else {
            $Postagem = new PostagensVO();
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
            if ($fotoAtual) {
                unlink("uploads/" . $fotoAtual);
            }
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
        if ($vo->getFoto()) {
            unlink("uploads/" . $vo->getFoto());
        }
        $result = $model->delete($vo);

        $this->redirect("Template.php");
    }
}