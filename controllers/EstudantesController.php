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
            $cursoVO->setId($idCurso);
    
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
        $cursoId = $_POST["curso_id"];
        
        
        $cursoVO = new CursosVO();
        $cursoVO->setId($cursoId);
        $cursoModel = new CursosModel();
        $curso = $cursoModel->selectOne($cursoVO);
    
        if (!$curso) {
            echo "Curso não encontrado.";
            exit;
        }
    
        $vagas = $curso->getVagas(); 
    
        
        $modelEstudantes = new EstudantesModel();
        $inscritos = $modelEstudantes->contarPorCurso($cursoId);
    
        if ($inscritos >= $vagas) {
            $this->redirect("Estudantes.php?erro=Nm");
            exit;
        }
    
        
        $id = $_POST["id"];
        $vo = new EstudantesVO($id, $cursoId, $_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["ocupacao"]);
    
        if (empty($id)) {
            $result = $modelEstudantes->insert($vo);
        } else {
            $result = $modelEstudantes->update($vo);
        }
        $vagas_new = $curso->setVagas($vagas -= 1);
        $this->redirect("Estudantes.php");
    }

    public function remove() {
        $vo = new EstudantesVO($_GET["id"]);
        $model = new EstudantesModel();

        $cursoId = $_GET["curso_id"];
    
        $cursoVO = new CursosVO();
        $cursoVO->setId($cursoId);
        $cursoModel = new CursosModel();
        $curso = $cursoModel->selectOne($cursoVO);
        $vagas = $curso->getVagas();
        $result = $model->delete($vo);

        $vagas_new = $curso->setVagas($vagas += 1);
        $this->redirect("Estudantes.php");
    }
}