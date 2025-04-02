<?php

namespace Model;

use Model\VO\PostagensVO;

final class PostagensModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM Postagens";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new PostagensVO($row["id"], $row["titulo"], $row["descricao"], $row["foto"], $row["projeto_id"], $row["data_criacao"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectPostsPerProjects($vo) {
        $db = new Database();
        $query = "SELECT * FROM Postagens WHERE projeto_id = :projeto_id";
        $binds = [":projeto_id" => $vo->getProjetoId()];
        $data = $db->select($query, $binds);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new PostagensVO($row["id"], $row["titulo"], $row["descricao"], $row["foto"], $row["projeto_id"], $row["data_criacao"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM Postagens WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new PostagensVO($data[0]["id"], $data[0]["titulo"], $data[0]["descricao"], $data[0]["foto"], $data[0]["projeto_id"], $data[0]["data_criacao"]);
    }

    public function insert($vo) {
        $db = new Database();
    
        $query = "INSERT INTO Postagens (titulo, descricao, foto, projeto_id, data_criacao) VALUES (:titulo, :descricao, :foto, :projeto_id, :data_criacao)";
        $binds = [
            ":titulo" => $vo->getTitulo(),
            ":descricao" => $vo->getDescricao(),
            ":foto" => $vo->getFoto(),
            ":projeto_id" => $vo->getProjetoId(),
            ":data_criacao" => $vo->getDataCriacao()
        ];
    
        return $db->execute($query, $binds);
    }
    

    public function update($vo) {
        $db = new Database();

        
            $query = "UPDATE Postagens SET titulo = :titulo, descricao = :descricao, foto = :foto, projeto_id = :projeto_id, data_criacao = :data_criacao WHERE id = :id";
            $binds = [
                ":titulo" => $vo->getTitulo(),
                ":descricao" => $vo->getDescricao(),
                ":foto" => $vo->getFoto(),
                ":projeto_id" => $vo->getProjetoId(),
                ":data_criacao" => $vo->getDataCriacao(),
                ":id" => $vo->getId()
            ];
    

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM Postagens WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}