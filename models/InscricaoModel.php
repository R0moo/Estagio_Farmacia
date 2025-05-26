<?php
namespace Model;

use Model\VO\InscricaoVO;
use Model\VO\CursosVO;

final class InscricaoModel extends Model {

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO inscricoes (usuario_id, curso_id) VALUES (:usuario_id, :curso_id)";
        $binds = [
            ":usuario_id" => $vo->getUsuarioId(),
            ":curso_id" => $vo->getCursoId()
        ];
        return $db->execute($query, $binds);
    }

    public function selectCursosByUsuarioId($usuarioId) {
        $db = new Database();
        $query = "SELECT c.* FROM cursos c
                  INNER JOIN inscricoes i ON i.curso_id = c.id
                  WHERE i.usuario_id = :usuario_id";

        $binds = [":usuario_id" => $usuarioId];
        $data = $db->select($query, $binds);

        $cursos = [];
        foreach ($data as $row) {
            $cursos[] = new CursosVO(
                $row["id"],
                $row["titulo"],
                $row["resumo"],
                $row["vagas"],
                $row["materiais"],
                $row["carga_horaria"],
                $row["data_inicio"],
                $row["data_fim"],
                $row["imagem"]
            );
        }
        return $cursos;
    }

        public function selectAll($vo){
        $db = new Database();
        $query = "SELECT * FROM Inscricoes";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new InscricaoVO($row['id'], $row['usuario_id'], $row['curso_id'], $row['data_inscricao']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo){

    }
    public function update($vo){
    }

     public function delete($vo){
    }
}
