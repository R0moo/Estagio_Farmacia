<?php

namespace Model;

use Model\VO\EstudantesVO;
use Model\Database;

final class EstudantesModel extends Model
{
    public function selectAll($vo){
        $db = new Database();
        $query = "SELECT * FROM estudantes";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new EstudantesVO($row['id'], $row['curso_id'], $row['nome'], $row['cpf'], $row['email'],$row['ocupacao']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectByCursoId($cursoId) {
    $db = new Database();
    $query = "SELECT * FROM estudantes WHERE curso_id = :cursoId";
    $params = [':cursoId' => $cursoId];
    
    $data = $db->select($query, $params);

    $arrayList = [];

    foreach ($data as $row) {
        $vo = new EstudantesVO($row['id'], $row['curso_id'], $row['nome'], $row['cpf'], $row['email'],$row['ocupacao']);
        array_push($arrayList, $vo);
    }

    return $arrayList;
}

public function selectOne($vo){
    $db = new Database();
    $query = "SELECT * FROM estudantes WHERE id = :id";
    $binds = [':id' => $vo->getId()];

    $data = $db->select($query, $binds);

    if ($data && isset($data[0])) {
        return new EstudantesVO(
            $data[0]['id'],
            $data[0]['curso_id'],
            $data[0]['nome'],
            $data[0]['email'],
            $data[0]['cpf'],
            $data[0]['ocupacao']
        );
    }

    return new EstudantesVO(); // ou return null;
}
    
    public function insert($vo){
        $db = new Database();
        $query = "INSERT INTO estudantes (curso_id, nome, cpf, email, ocupacao) 
                    VALUES (:curso_id, :nome, :cpf, :email, :ocupacao)";
        $binds = [
            ":curso_id" => $vo->getCursoId(),
            ":nome" => $vo->getNome(),
            ":cpf" => $vo->getCpf(),
            ":email" => $vo->getEmail(),
            ":ocupacao" => $vo->getOcupacao(),
        ];

        return $db->execute($query, $binds);
    }
    public function update($vo){
        $db = new Database();
            
            $query = "UPDATE estudantes SET curso_id = :curso_id, nome = :nome, cpf = :cpf, email = :email, ocupacao = :ocupacao
                        WHERE id = :id";
            $binds = [
                ":curso_id" => $vo->getCursoId(),
                ":nome" => $vo->getNome(),
                ":cpf" => $vo->getCpf(),
                ":email" => $vo->getEmail(),
                ":ocupacao" => $vo->getOcupacao(),
                ":id" => $vo->getId()
            ];

        return $db->execute($query, $binds);
    }

    public function delete($vo){
        $db = new Database();
        $query = "DELETE FROM estudantes WHERE id = :id";
        $binds= [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function contarPorCurso($cursoId) {
        $db = new Database(); 
        $query = "SELECT COUNT(*) as total FROM estudantes WHERE curso_id = :curso_id";
        $binds = [":curso_id" => $cursoId];
        $result = $db->select($query, $binds);
    
        return $result[0]['total'] ?? 0;
    }


}
