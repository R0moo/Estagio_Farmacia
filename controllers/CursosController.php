<?php

namespace Controller;

use Model\CursosModel;
use Model\VO\CursosVO;

final class CursosController extends Controller {

    public function list() {
        if (!empty($_GET['id'])) {
            $idProjeto = $_GET['id'];
    
            $projetoVO = new CursosVO();
            $projetoVO->setId($idProjeto);
    
            $modelProjeto = new CursosModel();
            $projetoCompleto = $modelProjeto->selectOne($projetoVO);

            $_SESSION['projeto'] = $projetoCompleto;
        }
    
        $project = $_SESSION['projeto'] ?? null;
    
        $modelCursos = new CursosModel();
        $data = $modelCursos->selectAll(new CursosVO());
    
        $logged = isset($_SESSION["usuario"]);
    
        $this->loadView("listaCursos", [
            "Cursos" => $data,
            "logado" => $logged,
            "projeto" => $project
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new CursosModel();
            $vo = new CursosVO($id);
            $Curso = $model->selectOne($vo);
        } else {
            $Curso = new CursosVO();
        }
        $this->loadView("formCursos", [
            "Curso" => $Curso
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

        $vo = new CursosVO($id, $_POST["estudantes_id"], $_POST["avaliacao_id"],$_POST["titulo"], $_POST["resumo"], $_POST["vagas"], $_POST["materiais"], $_POST["carga_horaria"], $_POST["data_inicio"], $_POST["data_fim"], $nomeArquivo );
        $model = new CursosModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("Cursos.php");
    }

    public function remove() {
        $vo = new CursosVO($_GET["id"], '', '', $_GET['ft']);
        $model = new CursosModel();
        if ($vo->getFoto()) {
            unlink("uploads/" . $vo->getFoto());
        }
        $result = $model->delete($vo);

        $this->redirect("Cursos.php");
    }
}