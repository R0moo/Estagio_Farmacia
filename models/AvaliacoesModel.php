<?php

namespace Model;

use Model\VO\AvaliacoesVO;

final class AvaliacoesModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM Avaliacoes";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new AvaliacoesVO(
                $row["id"],
                $row["estudante_id"], $row["curso_id"],
                $row["cc_1"], $row["cc_2"], $row["cc_3"], $row["cc_4"], $row["cc_5"], $row["cc_6"],
                $row["cc_7"], $row["cc_8"], $row["cc_9"], $row["cc_10"], $row["cc_11"], $row["cc_12"], $row["cc_13"],
                $row["rc_1"], $row["rc_3"], $row["rc_4"], $row["rc_5"], $row["rc_6"], $row["rc_7"],
                $row["ag_1"], $row["ag_3"], $row["ag_4"], $row["ag_5"], $row["ag_6"], $row["ag_7"],
                $row["comentario"]
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM Avaliacoes WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new AvaliacoesVO(
            $data[0]["id"],
            $data[0]["estudante_id"], $data[0]["curso_id"],
            $data[0]["cc_1"], $data[0]["cc_2"], $data[0]["cc_3"], $data[0]["cc_4"], $data[0]["cc_5"], $data[0]["cc_6"],
            $data[0]["cc_7"], $data[0]["cc_8"], $data[0]["cc_9"], $data[0]["cc_10"], $data[0]["cc_11"], $data[0]["cc_12"], $data[0]["cc_13"],
            $data[0]["rc_1"], $data[0]["rc_3"], $data[0]["rc_4"], $data[0]["rc_5"], $data[0]["rc_6"], $data[0]["rc_7"],
            $data[0]["ag_1"], $data[0]["ag_3"], $data[0]["ag_4"], $data[0]["ag_5"], $data[0]["ag_6"], $data[0]["ag_7"],
            $data[0]["comentario"]
        );
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO Avaliacoes (
            estudante_id, curso_id,
            cc_1, cc_2, cc_3, cc_4, cc_5, cc_6, cc_7, cc_8, cc_9, cc_10, cc_11, cc_12, cc_13,
            rc_1, rc_3, rc_4, rc_5, rc_6, rc_7,
            ag_1, ag_3, ag_4, ag_5, ag_6, ag_7,
            comentario
        ) VALUES (
            :estudante_id, :curso_id,
            :cc_1, :cc_2, :cc_3, :cc_4, :cc_5, :cc_6, :cc_7, :cc_8, :cc_9, :cc_10, :cc_11, :cc_12, :cc_13,
            :rc_1, :rc_3, :rc_4, :rc_5, :rc_6, :rc_7,
            :ag_1, :ag_3, :ag_4, :ag_5, :ag_6, :ag_7,
            :comentario
        )";

        $binds = [
            ":estudante_id" => $vo->getEstudanteId(),
            ":curso_id" => $vo->getCursoId(),
            ":cc_1" => $vo->getCc1(), ":cc_2" => $vo->getCc2(), ":cc_3" => $vo->getCc3(), ":cc_4" => $vo->getCc4(),
            ":cc_5" => $vo->getCc5(), ":cc_6" => $vo->getCc6(), ":cc_7" => $vo->getCc7(), ":cc_8" => $vo->getCc8(),
            ":cc_9" => $vo->getCc9(), ":cc_10" => $vo->getCc10(), ":cc_11" => $vo->getCc11(),
            ":cc_12" => $vo->getCc12(), ":cc_13" => $vo->getCc13(),
            ":rc_1" => $vo->getRc1(), ":rc_3" => $vo->getRc3(), ":rc_4" => $vo->getRc4(),
            ":rc_5" => $vo->getRc5(), ":rc_6" => $vo->getRc6(), ":rc_7" => $vo->getRc7(),
            ":ag_1" => $vo->getAg1(), ":ag_3" => $vo->getAg3(), ":ag_4" => $vo->getAg4(),
            ":ag_5" => $vo->getAg5(), ":ag_6" => $vo->getAg6(), ":ag_7" => $vo->getAg7(),
            ":comentario" => $vo->getComentario()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE Avaliacoes SET
            estudante_id = :estudante_id,
            curso_id = :curso_id,
            cc_1 = :cc_1, cc_2 = :cc_2, cc_3 = :cc_3, cc_4 = :cc_4, cc_5 = :cc_5,
            cc_6 = :cc_6, cc_7 = :cc_7, cc_8 = :cc_8, cc_9 = :cc_9, cc_10 = :cc_10,
            cc_11 = :cc_11, cc_12 = :cc_12, cc_13 = :cc_13,
            rc_1 = :rc_1, rc_3 = :rc_3, rc_4 = :rc_4, rc_5 = :rc_5, rc_6 = :rc_6, rc_7 = :rc_7,
            ag_1 = :ag_1, ag_3 = :ag_3, ag_4 = :ag_4, ag_5 = :ag_5, ag_6 = :ag_6, ag_7 = :ag_7,
            comentario = :comentario
            WHERE id = :id";

        $binds = [
            ":estudante_id" => $vo->getEstudanteId(),
            ":curso_id" => $vo->getCursoId(),
            ":cc_1" => $vo->getCc1(), ":cc_2" => $vo->getCc2(), ":cc_3" => $vo->getCc3(), ":cc_4" => $vo->getCc4(),
            ":cc_5" => $vo->getCc5(), ":cc_6" => $vo->getCc6(), ":cc_7" => $vo->getCc7(), ":cc_8" => $vo->getCc8(),
            ":cc_9" => $vo->getCc9(), ":cc_10" => $vo->getCc10(), ":cc_11" => $vo->getCc11(),
            ":cc_12" => $vo->getCc12(), ":cc_13" => $vo->getCc13(),
            ":rc_1" => $vo->getRc1(), ":rc_3" => $vo->getRc3(), ":rc_4" => $vo->getRc4(),
            ":rc_5" => $vo->getRc5(), ":rc_6" => $vo->getRc6(), ":rc_7" => $vo->getRc7(),
            ":ag_1" => $vo->getAg1(), ":ag_3" => $vo->getAg3(), ":ag_4" => $vo->getAg4(),
            ":ag_5" => $vo->getAg5(), ":ag_6" => $vo->getAg6(), ":ag_7" => $vo->getAg7(),
            ":comentario" => $vo->getComentario(),
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM Avaliacoes WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
