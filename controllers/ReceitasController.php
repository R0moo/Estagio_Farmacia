<?php

namespace Controller;

use Model\ReceitasModel;
use Model\VO\ReceitasVO;

final class ReceitasController extends Controller {

    public function list() {
        $model = new ReceitasModel();
        $data = $model->selectAll(new ReceitasVO());

        $logged = isset($_SESSION["usuario"]);

        $this->loadView("listaReceitas", [
            "Receitas" => $data,
            "logado" => $logged
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new ReceitasModel();
            $vo = new ReceitasVO($id);
            $Receita = $model->selectOne($vo);
        } else {
            $Receita = new ReceitasVO();
        }
        $this->loadView("formReceitas", [
            "Receita" => $Receita
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $fotoAtual = $_POST['foto_atual'];

        if (!empty($_FILES['imagem']['name'])) {
            $nomeArquivo = $this->uploadFiles($_FILES['imagem']); 
            if ($fotoAtual) {
                unlink("uploads/" . $fotoAtual);
            }
        } else {
            $nomeArquivo = $fotoAtual;
        }

        $vo = new ReceitasVO($id, $_POST["titulo"], $_POST["descricao"], $_POST['ingredientes'], $_POST["modo_preparo"], $_POST["tempo_preparo"], $_POST["rendimento"], $_POST["categoria"], $nomeArquivo, $_POST["data_criacao"]);
        $model = new ReceitasModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("Receitas.php");
    }

    public function remove() {
        $vo = new ReceitasVO($_GET["id"]);
        $model = new ReceitasModel();

        $result = $model->delete($vo);

        $this->redirect("Receitas.php");
    }
}