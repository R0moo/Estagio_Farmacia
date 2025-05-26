<?php

namespace Model\VO;

final class InscricaoVO extends VO {
    private $usuario_id;
    private $curso_id;
    private $data_inscricao;

    public function __construct($id = 0, $usuario_id = 0, $curso_id = 0, $data_inscricao) {
        parent::__construct($id);
        $this->usuario_id = $usuario_id;
        $this->curso_id = $curso_id;
        $this->data_inscricao = $data_inscricao;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function getCursoId() {
        return $this->curso_id;
    }

    public function setCursoId($curso_id) {
        $this->curso_id = $curso_id;
    }

        public function getDataInscricao() {
        return $this->data_inscricao;
    }

    public function setDataInscricao($data_inscricao) {
        $this->data_inscricao = $data_inscricao;
    }
}

