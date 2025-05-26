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
    } else {
        $estudantesDoCurso = $model->selectByCursoId($cursoId);

        if (count($estudantesDoCurso) < $vagas) {
                $model->insert($vo);
                $curso->setVagas($vagas - 1);
            $usuarioModel = new \Model\UsuarioModel();
            if (!$usuarioModel->existsByEmailOrCpf($email, $cpf)) {

                $usuarioVO = new \Model\VO\UsuarioVO();
                $usuarioVO->setLogin($email);
                $usuarioVO->setSenha($cpf); // trocar isso tudo pra password hash e verify
                $usuarioVO->setNivel("3");
                $usuarioVO->setEmail($email);
                $usuarioVO->setCpf($cpf);
                $usuarioVO->setOcupacao($ocupacao);

                $usuarioModel->insert($usuarioVO);
            }else{

            }
        } else {
            $erro = "Nf";
        }
    }

    header("Location: Estudantes.php?id=" . $cursoId . "&erro=" . ($erro ?? ""));
}



    public function remove() {
    $idEstudante = $_GET["id"];
    $cursoId = $_GET["curso_id"];

    $model = new EstudantesModel();
    $vo = $model->selectOne(new EstudantesVO($idEstudante)); // Recupera dados do estudante antes de deletar

    // Remove estudante
    $model->delete(new EstudantesVO($idEstudante));

    // Atualiza vagas do curso
    $cursoVO = new CursosVO();
    $cursoVO->setId($cursoId);
    $cursoModel = new CursosModel();
    $curso = $cursoModel->selectOne($cursoVO);
    $vagas = $curso->getVagas();
    $curso->setVagas($vagas + 1);

    // Remove o usuário correspondente (por email e cpf)
    $usuarioModel = new \Model\UsuarioModel();

    $usuarios = $usuarioModel->selectAll(new \Model\VO\UsuarioVO());
    foreach ($usuarios as $usuario) {
        if ($usuario->getEmail() === $vo->getEmail() && $usuario->getCpf() === $vo->getCpf()) {
            $usuarioModel->delete($usuario);
            break; // garante que só remove um
        }
    }

    $this->redirect("Estudantes.php?id=". $cursoId);
}
}