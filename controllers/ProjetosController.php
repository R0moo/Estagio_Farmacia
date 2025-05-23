<?php

namespace Controller;

use Model\ProjetosModel;
use Model\VO\ProjetosVO;

final class ProjetosController extends Controller {

    public function list() {
        $model = new ProjetosModel();
        $data = $model->selectAll(new ProjetosVO());

        $logged = isset($_SESSION["usuario"]);

        $this->loadView("PagInicial", [
            "Projetos" => $data,
            "logado" => $logged
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new ProjetosModel();
            $vo = new ProjetosVO($id);
            $Projeto = $model->selectOne($vo);
        } else {
            $Projeto = new ProjetosVO();
        }
        $this->loadView("formProjetos", [
            "Projeto" => $Projeto
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $fotoAtual = $_POST['foto_atual'];

        if (!empty($_FILES['capa']['name'])) {
            $nomeArquivo = $this->uploadFiles($_FILES['capa']); 
            if ($fotoAtual) {
                unlink("uploads/" . $fotoAtual);
            }
        } else {
            $nomeArquivo = $fotoAtual;
        }

        $vo = new ProjetosVO($id, $_POST["titulo"], $_POST["descricao"], $nomeArquivo, $_POST["cor1"], $_POST["cor2"]);
        $model = new ProjetosModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("Projetos.php");
    }

    public function remove() {
        $vo = new ProjetosVO($_GET["id"]);
        $model = new ProjetosModel();

        $result = $model->delete($vo);

        $this->redirect("Projetos.php");
    }
}