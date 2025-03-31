<?php

namespace Model;

use Model\VO\ProjetosVO;

final class ProjetosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM Projetos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new ProjetosVO($row["id"], $row["titulo"], $row["descricao"], $row["capa"], $row["cor1"], $row["cor2"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM Projetos WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new ProjetosVO($data[0]["id"], $data[0]["titulo"], $data[0]["descricao"], $data[0]["capa"], $data[0]["cor1"], $data[0]["cor2"]);
    }

    public function insert($vo) {
        $db = new Database();
    
        $query = "INSERT INTO Projetos (titulo, descricao, capa, cor1, cor2) VALUES (:titulo, :descricao, :capa, :cor1, :cor2)";
        $binds = [
            ":titulo" => $vo->getTitulo(),
            ":descricao" => $vo->getDescricao(),
            ":capa" => $vo->getCapa(),
            ":cor1" => $vo->getCor1(),
            ":cor2" => $vo->getCor2(),
        ];
    
        return $db->execute($query, $binds);
    }
    

    public function update($vo) {
        $db = new Database();

        
            $query = "UPDATE Projetos SET titulo = :titulo, descricao = :descricao, capa = :capa, cor1 = :cor1, cor2 = :cor2 WHERE id = :id";
            $binds = [
                ":titulo" => $vo->getTitulo(),
                ":descricao" => $vo->getDescricao(),
                ":capa" => $vo->getCapa(),
                ":cor1" => $vo->getCor1(),
                ":cor2" => $vo->getCor2(),
                ":id" => $vo->getId()
            ];
    

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM Projetos WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}