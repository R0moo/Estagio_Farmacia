<?php

namespace Model;

use Model\VO\CursosVO;

final class CursosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM Cursos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CursosVO($row["id"], $row["estudantes_id"], $row["avaliacao_id"], $row["titulo"], $row["resumo"], $row["vagas"], $row["materiais"], $row["carga_horaria"], $row["data_inicio"], $row["data_fim"], $row["imagem"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM Cursos WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CursosVO($data[0]["id"], $data[0]["estudantes_id"], $data[0]["avaliacao_id"], $data[0]["titulo"], $data[0]["resumo"], $data[0]["vagas"], $data[0]["materiais"], $data[0]["carga_horaria"], $data[0]["data_inicio"], $data[0]["data_fim"], $data[0]["imagem"]);
    }

    public function insert($vo) {
        $db = new Database();
        
    
        $query = "INSERT INTO Cursos (estudantes_id, avaliacao_id, titulo, resumo, vagas, materiais, carga_horaria, data_inicio, data_fim, imagem) VALUES (:estudantes_id, :avaliacao_id, :titulo, :resumo, :vagas, :materiais, :carga_horaria, :data_inicio, :data_fim, :imagem)";
        $binds = [
            ":estudantes_id" => $vo->getEstudantesId(),
            ":avaliacao_id" => $vo->getEstudantesId(),
            ":titulo" => $vo->getTitulo(),
            ":resumo" => $vo->getResumo(),
            ":vagas" => $vo->getVagas(),
            ":materiais" => $vo->getMateriais(),
            ":carga_horaria" => $vo->getCargaHoraria(),
            ":data_inicio" => $vo->getDataInicio(),
            ":data_fim" => $vo->getDataFim(),
            ":imagem" => $vo->getImagem(),
        ];
    
        return $db->execute($query, $binds);
    }
    

    public function update($vo) {
        $db = new Database();

        
            $query = "UPDATE Cursos SET estudantes_id = :estudantes_id, avaliacao_id = :avaliacao_id, titulo = :titulo, resumo = :resumo, vagas = :vagas, materiais = :materiais, carga_horaria = :carga_horaria, data_inicio = :data_inicio, data_fim = :data_fim, imagem = :imagem WHERE id = :id";
            $binds = [
                ":estudantes_id" => $vo->getEstudantesId(),
                "avaliacao_id" => $vo->getAvaliacaoId(),
                ":titulo" => $vo->getTitulo(),
                ":resumo" => $vo->getResumo(),
                ":vagas" => $vo->getVagas(),
                ":materiais" => $vo->getMateriais(),
                ":carga_horaria" => $vo->getCargaHoraria(),
                ":data_inicio" => $vo->getDataInicio(),
                ":data_fim" => $vo->getDataFim(),
                ":imagem" => $vo->getImagem(),
                ":id" => $vo->getId()
            ];
    

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM Cursos WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}