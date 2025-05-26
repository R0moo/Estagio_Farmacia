<?php

namespace Model\VO;

final class RespostasVO extends VO {

    private $avaliacao_id;
    private $pergunta_id;
    private $resposta;

    public function __construct($id = 0, $avaliacao_id = 0, $pergunta_id = 0, $resposta = '') {
        parent::__construct($id);
        $this->avaliacao_id = $avaliacao_id;
        $this->pergunta_id = $pergunta_id;
        $this->resposta = $resposta;
    }

    public function getAvaliacaoId() {
        return $this->avaliacao_id;
    }

    public function setAvaliacaoId($avaliacao_id) {
        $this->avaliacao_id = $avaliacao_id;
    }

    public function getPerguntaId() {
        return $this->pergunta_id;
    }

    public function setPerguntaId($pergunta_id) {
        $this->pergunta_id = $pergunta_id;
    }

    public function getResposta() {
        return $this->resposta;
    }

    public function setResposta($resposta) {
        $this->resposta = $resposta;
    }
}
