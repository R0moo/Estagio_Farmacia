<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;
use Model\InscricaoModel;
use Model\VO\InscricaoVO;

final class UsuarioController extends Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function list(){
        $model = new UsuarioModel();
        $data = $model->selectAll(new UsuarioVO());

        $this->loadView("listaUsuarios", [
            "usuarios" => $data
        ]);
    }

    public function mostrarPerfil(){
      $usuarioId = $_SESSION["usuario"]->getId();

    $usuarioModel = new UsuarioModel();
    $usuario = $usuarioModel->selectOne(new UsuarioVO($usuarioId));

    $inscricaoModel = new InscricaoModel();
    $cursos = $inscricaoModel->selectCursosByUsuarioId($usuarioId);

    $logged = isset($_SESSION["usuario"]);

    // Cálculo da carga horária total
    $cargaHorariaTotal = 0;
    foreach ($cursos as $curso) {
        $cargaHorariaTotal += $curso->getCargaHoraria();
    }

    $this->loadView("meuPerfil", [
        "usuario" => $usuario,
        "cursos" => $cursos,
        "cargaHorariaTotal" => $cargaHorariaTotal,
        "logado" => $logged
    ]);
    }

    public function form(){
        $id = $_GET['id'] ?? 0;

        if(empty($id)){
            $vo = new UsuarioVO();
        } else {
            $model = new UsuarioModel();
            $vo = $model->selectOne(new UsuarioVO($id));
        }
        $this->loadView("formUsuario", [
            "usuario" => $vo
        ]);
    }
        
    public function save() {
        $id = $_POST['id'] ?? 0;
        $model = new UsuarioModel();

        $vo = new UsuarioVO($id, $_POST['login'], $_POST['senha'], $_POST['nivel'], $_POST['email'], $_POST['cpf'], $_POST['ocupacao']);
        
        if(empty($id)){
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("usuarios.php");
    }

    public function remove() {
        $model = new UsuarioModel();
        $model->delete(new UsuarioVO($_GET['id']));
        $this->redirect("usuarios.php");
    }
}
