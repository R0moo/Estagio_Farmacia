<?php

namespace Controller;

use Model\EstudantesModel;
use Model\VO\EstudantesVO;
use Model\CursosModel;
use Model\VO\CursosVO;

final class EstudantesController extends Controller {

    public function list() {
        if (!empty($_GET['id'])) {
            $idCurso = $_GET['id'];
    
            $cursoVO = new CursosVO();
            $cursoVO->setId($idcurso);
    
            $modelCurso = new CursosModel();
            $cursoCompleto = $modelCurso->selectOne($cursoVO);

            $_SESSION['curso'] = $cursoCompleto;
        }
    
        $curso = $_SESSION['curso'] ?? null;
    
        $modelEstudantes = new EstudantesModel();
        $data = $modelEstudantes->selectAll(new EstudantesVO());
    
        $logged = isset($_SESSION["usuario"]);
    
        $this->loadView("listaEstudantes", [
            "Estudantes" => $data,
            "logado" => $logged,
            "curso" => $curso
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;
        $cursoId = $_SESSION['curso']->getId() ?? null; // Verificar se cursoId está definido

        if(!empty($id)) {
            $model = new EstudantesModel();
            $vo = new EstudantesVO($id);
            $Estudante = $model->selectOne($vo);
        } else {
            $Estudante = new EstudantesVO();
        }
        $this->loadView("formEstudantes", [
            "Estudante" => $Estudante,
            "cursoId" => $cursoId
        ]);
    }

    public function save() {
        $id = $_POST["id"];

        $vo = new EstudantesVO($id, $_POST["curso_id"], $_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["ocupacao"]);
        $model = new EstudantesModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("listaEstudantes.php");
    }

    public function remove() {
        $vo = new EstudantesVO($_GET["id"]);
        $model = new EstudantesModel();
        $result = $model->delete($vo);

        $this->redirect("listaEstudantes.php");
    }
}