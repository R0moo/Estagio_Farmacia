<?php
namespace Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

use Carbon\Carbon;
date_default_timezone_set('America/Sao_Paulo');

use Model\CursosModel;
use Model\VO\CursosVO;


final class CursosController extends Controller {

    public function list() {
        $model = new CursosModel();
        $data = $model->selectAll(new CursosVO());

        $data_de_hj = Carbon::now();

        $logged = isset($_SESSION["usuario"]);
        
        $this->loadView("listaCursos", [
            "Cursos" => $data,
            "logado" => $logged,
            "hoje" => $data_de_hj->format("Y-m-d"),
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
        $pasta = "uploads/";
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];
    
        $nomeArquivo = $fotoAtual;
    
        if (!empty($_FILES['imagem']['name'])) {
            $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    
            if (in_array($extensao, $tiposPermitidos)) {
                $nomeArquivo = uniqid('imagem_') . '.' . $extensao;
                $destino = $pasta . $nomeArquivo;
    
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                    if ($fotoAtual && file_exists($pasta . $fotoAtual)) {
                        unlink($pasta . $fotoAtual);
                    }
                } else {
                    echo "Erro ao enviar a imagem!";
                }
            } else {
                echo "Tipo de imagem não permitido!";
            }
        }
    
        $nomesMateriais = [];
        if (!empty($_FILES['materiais']['name'][0])) {
            $total = count($_FILES['materiais']['name']);
        
            for ($i = 0; $i < $total; $i++) {
                $nomeOriginal = $_FILES['materiais']['name'][$i];
                $tmp = $_FILES['materiais']['tmp_name'][$i];
                $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        
                if (in_array($extensao, $tiposPermitidos)) {
                    $novoNome = uniqid('material_') . '.' . $extensao;
                    $destino = $pasta . $novoNome;
        
                    if (move_uploaded_file($tmp, $destino)) {
                        $nomesMateriais[] = $novoNome;
                        echo "Material $nomeOriginal enviado como $novoNome<br>";
                    } else {
                        echo "Erro ao enviar $nomeOriginal<br>";
                    }
                } else {
                    echo "Tipo de arquivo $nomeOriginal não permitido.<br>";
                }
            }
        }

        $stringMateriais = implode(',', $nomesMateriais);

        $vo = new CursosVO($id, $_POST["titulo"], $_POST["resumo"], $_POST["vagas"], $stringMateriais, $_POST["carga_horaria"], $_POST["data_inicio"], $_POST["data_fim"], $nomeArquivo );
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
        if ($vo->getImagem()) {
            unlink("uploads/" . $vo->getImagem());
        }
        $result = $model->delete($vo);

        $this->redirect("Cursos.php");
    }

    public function inscrever(){
        $this->loadView("formInscricao", []);
    }
    public function sendMail(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST['cpf'];

        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor
            $mail->isSMTP();                                            // Enviar usando SMTP
            $mail->Host       = 'live.smtp.mailtrap.io';                     // Defina o servidor SMTP para enviar
            $mail->SMTPAuth   = true;                                   // Habilitar autenticação SMTP
            $mail->Username   = 'smtp@mailtrap.io';               // username SMTP
            $mail->Password   = '399eacd93657d749e6c872fae9ff0feb';                        // senha SMTP
            $mail->SMTPSecure = 'tls'; // Habilitar criptografia TLS
            $mail->Port       = 587;                                    // Porta TCP para conectar

            $mail->setFrom('smtp@mailtrap.io', 'Rômulo');
            $mail->addAddress($email, $nome);
            // Enviar email em texto simples
            $mail->isHTML(false); // Definir formato do email para texto simples
            $mail->Subject = 'Inscrição Farmácia Verde';
            $mail->Body    = 'Olá ' . $nome . 'sua inscrição foi encaminhada com sucesso. Aliás, esse é o seu CPF: ' . $cpf;

            // Enviar o email
            if(!$mail->send()){
                echo 'A mensagem não pôde ser enviada. Erro do Mailer: ' . $mail->ErrorInfo;
            } else {
                echo 'A mensagem foi enviada';
            }   
            } catch (Exception $e) {
            echo "A mensagem não pôde ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
            }
    }
}