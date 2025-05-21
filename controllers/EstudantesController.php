<?php

namespace Controller;

use Model\EstudantesModel;
use Model\VO\EstudantesVO;
use Model\CursosModel;
use Model\VO\CursosVO;

final class EstudantesController extends Controller {

   public function list()
{
    $idCurso = $_GET['id'] ?? null;

    $curso = null;
    if ($idCurso) {
        $cursoVO = new CursosVO();
        $cursoVO->setId($idCurso);

        $modelCurso = new CursosModel();
        $curso = $modelCurso->selectOne($cursoVO);
    }

    $logged = isset($_SESSION["usuario"]);

    $model = new EstudantesModel();
    $data = $model->selectAll(new EstudantesVO());


    $this->loadView("listaEstudantes", [
        "Estudantes" => $data,
        "curso" => $curso,
        "logado" => $logged
    ]);
}


    public function form()
{
    $id = $_GET["id"] ?? 0;
    $cursoId = $_GET['curso_id'] ?? null;

    $model = new EstudantesModel();
    if ($id) {
    $obj = $model->selectOne(new EstudantesVO($id));
    } else {
    $obj = new EstudantesVO(); 
    }

    $this->loadView("formEstudantes", [
        "Estudante" => $obj,
        "cursoId" => $cursoId
    ]);
}


    public function save(){
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $ocupacao = $_POST["ocupacao"];
    $cursoId = $_POST["curso_id"];

    $vo = new EstudantesVO($id, $cursoId, $nome, $cpf, $email, $ocupacao);
    $model = new EstudantesModel();

    $cursoVO = new CursosVO();
        $cursoVO->setId($cursoId);
        $cursoModel = new CursosModel();
        $curso = $cursoModel->selectOne($cursoVO);
        $vagas = $curso->getVagas();

    if ($id){
        $model->update($vo);
    }else{
        if (count($model->selectAll(new EstudantesVO())) < $vagas){
        $model->insert($vo);
        $curso->setVagas($vagas - 1);
        } else{
            $erro = "Nf";
        }
    }
    header("Location: Estudantes.php?id=" . $cursoId . "&erro=" . $erro);
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

        $curso->setVagas($vagas += 1);
        $this->redirect("Estudantes.php?id=". $cursoId);
    }
}