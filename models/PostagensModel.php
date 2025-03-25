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
            $vo = new PostagensVO($row["id"], $row["titulo"], $row["descricao"], $row["foto"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM Postagens WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new PostagensVO($data[0]["id"], $data[0]["titulo"], $data[0]["descricao"], $data[0]["foto"]);
    }

    public function insert($vo) {
        $db = new Database();
    
        $query = "INSERT INTO Postagens (titulo, descricao, foto) VALUES (:titulo, :descricao, :foto)";
        $binds = [
            ":titulo" => $vo->getTitulo(),
            ":descricao" => $vo->getDescricao(),
            ":foto" => $vo->getFoto(),
        ];
    
        return $db->execute($query, $binds);
    }
    

    public function update($vo) {
        $db = new Database();

        
            $query = "UPDATE Postagens SET titulo = :titulo, descricao = :descricao, foto = :foto WHERE id = :id";
            $binds = [
                ":titulo" => $vo->getTitulo(),
                ":descricao" => $vo->getDescricao(),
                ":foto" => $vo->getFoto(),
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