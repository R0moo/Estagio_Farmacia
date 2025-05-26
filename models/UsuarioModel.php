<?php

namespace Model;

use Model\VO\UsuarioVO;
use Model\Database;

final class UsuarioModel extends Model
{
    public function selectAll($vo){
        $db = new Database();
        $query = "SELECT * FROM usuarios";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new UsuarioVO($row['id'], $row['login'], $row['senha'], $row['nivel'], $row['email'], $row['cpf'], $row['ocupacao']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo){
        $db = new Database();
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new UsuarioVO($data[0]['id'], $data[0]['login'], $data[0]['senha'], $data[0]['nivel'], $data[0]['email'], $data[0]['cpf'], $data[0]['ocupacao']);

    }
    
    public function insert($vo){
        $db = new Database();
        $query = "INSERT INTO usuarios (login, senha, nivel, email, cpf, ocupacao) 
                    VALUES (:login, :senha, :nivel, :email, :cpf, :ocupacao)";
        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
            ":nivel" => $vo->getNivel(),
            ":email" => $vo->getEmail(),
            "cpf" => $vo->getCpf(),
            "ocupacao" => $vo->getOcupacao(),
        ];

        return $db->execute($query, $binds);
    }
    public function update($vo){
        $db = new Database();
        if(empty($vo->getSenha())){
            $query = "UPDATE usuarios SET login = :login, nivel = :nivel, email = :email, cpf = :cpf, ocupacao = :ocupacao
            WHERE id = :id";
            
            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":email" => $vo->getEmail(),
                ":cpf" => $vo->getCpf(),
                ":ocupacao" => $vo->getOcupacao(),
                ":id" => $vo->getId()
            ];
        }else{
            
            $query = "UPDATE usuarios SET login = :login, 
                        senha = :senha, nivel = :nivel, email = :email, cpf = :cpf, ocupacao = :ocupacao
                        WHERE id = :id";
            $binds = [
                ":login" => $vo->getLogin(),
                ":senha" => md5($vo->getSenha()),
                ":nivel" => $vo->getNivel(),
                ":email" => $vo->getEmail(),
                ":cpf" => $vo->getCpf(),
                ":ocupacao" => $vo->getOcupacao(),
                ":id" => $vo->getId()
            ];
        }

        return $db->execute($query, $binds);
    }
    public function delete($vo){
        $db = new Database();
        $query = "DELETE FROM usuarios WHERE id = :id";
        $binds= [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function doLogin($vo){

        $db = new Database();
        $query = "SELECT * FROM usuarios 
                WHERE login = :login AND senha = :senha";

        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
        ];
        $binds = [":login" => $vo->getLogin()];
        $binds[":senha"] = isset($_SESSION['usuario']) ? $vo->getSenha() : md5($vo->getSenha());

        $data  = $db->select($query, $binds);

        if(count($data) == 0){
            return null;
        }

        $_SESSION['usuario'] = new UsuarioVO($data[0]['id'], $data[0]['login'], $data[0]['senha'], $data[0]['nivel'], $data[0]['email'], $data[0]['cpf'], $data[0]['ocupacao']);

        return $_SESSION['usuario'];
    }

    public function existsByEmailOrCpf($email, $cpf) {
    $db = new Database();
    $query = "SELECT COUNT(*) as total FROM usuarios WHERE email = :email OR cpf = :cpf";
    $binds = [
        ":email" => $email,
        ":cpf" => $cpf,
    ];

    $data = $db->select($query, $binds);
    return $data[0]['total'] > 0;
}
}
