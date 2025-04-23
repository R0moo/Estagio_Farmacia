<?php

namespace Controller;

use Model\AvaliacoesModel;
use Model\VO\AvaliacoesVO;

final class AvaliacoesController extends Controller {

    public function list() {
        $model = new AvaliacoesModel();
        $data = $model->selectAll(new AvaliacoesVO());

        $logged = isset($_SESSION["usuario"]);

        $this->loadView("listaAvaliacoes", [
            "Avaliacoes" => $data,
            "logado" => $logged
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new AvaliacoesModel();
            $vo = new AvaliacoesVO($id);
            $Receita = $model->selectOne($vo);
        } else {
            $Receita = new AvaliacoesVO();
        }
        $this->loadView("formAvaliacoes", [
            "Receita" => $Receita
        ]);
    }

    public function save() {
        $id = $_POST["id"];

        $vo = new AvaliacoesVO($id, $_POST["estudante_id"], $_POST["curso_id"], $_POST['cc_1'], $_POST["cc_2"], $_POST["cc_3"], $_POST["cc_4"], $_POST["cc_5"], $_POST["cc_6"], $_POST["cc_7"], $_POST["cc_8"], $_POST["cc_9"], $_POST["cc_10"], $_POST["cc_11"], $_POST["cc_12"], $_POST["cc_13"], $_POST["rc_1"], $_POST["rc_2"], $_POST["rc_3"], $_POST["rc_4"], $_POST["rc_5"], $_POST["rc_6"], $_POST["rc_7"], $_POST["ag_1"], $_POST["ag_2"], $_POST["ag_3"], $_POST["ag_4"], $_POST["ag_5"], $_POST["ag_6"], $_POST["ag_7"], $_POST["comentario"] );
        $model = new AvaliacoesModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("Avaliacoes.php");
    }

    public function remove() {
        $vo = new AvaliacoesVO($_GET["id"]);
        $model = new AvaliacoesModel();

        $result = $model->delete($vo);

        $this->redirect("Avaliacoes.php");
    }
}