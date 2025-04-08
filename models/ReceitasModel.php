<?php

namespace Model;

use Model\VO\ReceitasVO;

final class ReceitasModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM receitas";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new ReceitasVO($row["id"], $row["titulo"], $row["descricao"], $row["ingredientes"], $row["modo_preparo"], $row["tempo_preparo"], $row["rendimento"], $row["categoria"], $row["imagem"], $row["data_criacao"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM Receitas WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new ReceitasVO($data[0]["id"], $data[0]["titulo"], $data[0]["descricao"], $data[0]["ingredientes"], $data[0]["modo_preparo"], $data[0]["tempo_preparo"], $data[0]["rendimento"], $data[0]["categoria"],$data[0]["imagem"], $data[0]["data_criacao"]);
    }

    public function insert($vo) {
        $db = new Database();
        
    
        $query = "INSERT INTO Receitas (titulo, descricao, ingredientes, modo_preparo, tempo_preparo, rendimento, categoria,imagem, data_criacao) VALUES (:titulo, :descricao, :ingredientes, :modo_preparo, :tempo_preparo, :rendimento, :categoria, :imagem, :data_criacao)";
        $binds = [
            ":titulo" => $vo->getTitulo(),
            ":descricao" => $vo->getDescricao(),
            ":ingredientes" => $vo->getIngredientes(),
            ":modo_preparo" => $vo->getModoPreparo(),
            ":tempo_preparo" => $vo->getTempoPreparo(),
            ":rendimento" => $vo->getRendimento(),
            ":categoria" => $vo->getCategoria(),
            ":imagem" => $vo->getImagem(),
            ":data_criacao" => $vo->getDataCriacao(),
            ":cor2" => $vo->getCor2(),
        ];
    
        return $db->execute($query, $binds);
    }
    

    public function update($vo) {
        $db = new Database();

        
            $query = "UPDATE Receitas SET titulo = :titulo, descricao = :descricao, ingredientes = :ingredientes, modo_preparo = :modo_preparo, tempo_preparo = :tempo_preparo, rendimento = :rendimento, categoria = :categoria, imagem = :imagem, data_criacao = :data_criacao WHERE id = :id";
            $binds = [
                ":titulo" => $vo->getTitulo(),
                ":descricao" => $vo->getDescricao(),
                ":ingredientes" => $vo->getIngredientes(),
                ":modo_preparo" => $vo->getModoPreparo(),
                ":tempo_preparo" => $vo->getTempoPreparo(),
                ":rendimento" => $vo->getRendimento(),
                ":categoria" => $vo->getCategoria(),
                ":imagem" => $vo->getImagem(),
                ":data_criacao" => $vo->getdataCriacao(),
                ":id" => $vo->getId()
            ];
    

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM Receitas WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}