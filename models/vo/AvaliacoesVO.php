<?php

namespace Model\VO;

final class AvaliacoesVO extends VO {

    private $estudante_id;
    private $curso_id;
    private $cc_1;
    private $cc_2;
    private $cc_3;
    private $cc_4;
    private $cc_5;
    private $cc_6;
    private $cc_7;
    private $cc_8;
    private $cc_9;
    private $cc_10;
    private $cc_11;
    private $cc_12;
    private $cc_13;
    private $rc_1;
    private $rc_3;
    private $rc_4;
    private $rc_5;
    private $rc_6;
    private $rc_7;
    private $ag_1;
    private $ag_3;
    private $ag_4;
    private $ag_5;
    private $ag_6;
    private $ag_7;
    private $comentario;

    public function __construct(
        $id = 0,
        $estudante_id = 0,
        $curso_id = 0,
        $cc_1 = 0,
        $cc_2 = 0,
        $cc_3 = 0,
        $cc_4 = 0,
        $cc_5 = 0,
        $cc_6 = 0,
        $cc_7 = 0,
        $cc_8 = 0,
        $cc_9 = 0,
        $cc_10 = 0,
        $cc_11 = 0,
        $cc_12 = 0,
        $cc_13 = 0,
        $rc_1 = 0,
        $rc_3 = 0,
        $rc_4 = 0,
        $rc_5 = 0,
        $rc_6 = 0,
        $rc_7 = 0,
        $ag_1 = 0,
        $ag_3 = 0,
        $ag_4 = 0,
        $ag_5 = 0,
        $ag_6 = 0,
        $ag_7 = 0,
        $comentario = ''
    ) {
        parent::__construct($id);
        $this->estudante_id = $estudante_id;
        $this->curso_id = $curso_id;
        $this->cc_1 = $cc_1;
        $this->cc_2 = $cc_2;
        $this->cc_3 = $cc_3;
        $this->cc_4 = $cc_4;
        $this->cc_5 = $cc_5;
        $this->cc_6 = $cc_6;
        $this->cc_7 = $cc_7;
        $this->cc_8 = $cc_8;
        $this->cc_9 = $cc_9;
        $this->cc_10 = $cc_10;
        $this->cc_11 = $cc_11;
        $this->cc_12 = $cc_12;
        $this->cc_13 = $cc_13;
        $this->rc_1 = $rc_1;
        $this->rc_3 = $rc_3;
        $this->rc_4 = $rc_4;
        $this->rc_5 = $rc_5;
        $this->rc_6 = $rc_6;
        $this->rc_7 = $rc_7;
        $this->ag_1 = $ag_1;
        $this->ag_3 = $ag_3;
        $this->ag_4 = $ag_4;
        $this->ag_5 = $ag_5;
        $this->ag_6 = $ag_6;
        $this->ag_7 = $ag_7;
        $this->comentario = $comentario;
    }

    // Getters e Setters
    
    public function getEstudanteId() { return $this->estudante_id; }
    public function setEstudanteId($estudante_id) { $this->estudante_id = $estudante_id; }

    public function getCursoId() { return $this->curso_id; }
    public function setCursoId($curso_id) { $this->curso_id = $curso_id; }

    public function getCc1() { return $this->cc_1; }
    public function setCc1($cc_1) { $this->cc_1 = $cc_1; }

    public function getCc2() { return $this->cc_2; }
    public function setCc2($cc_2) { $this->cc_2 = $cc_2; }

    public function getCc3() { return $this->cc_3; }
    public function setCc3($cc_3) { $this->cc_3 = $cc_3; }

    public function getCc4() { return $this->cc_4; }
    public function setCc4($cc_4) { $this->cc_4 = $cc_4; }

    public function getCc5() { return $this->cc_5; }
    public function setCc5($cc_5) { $this->cc_5 = $cc_5; }

    public function getCc6() { return $this->cc_6; }
    public function setCc6($cc_6) { $this->cc_6 = $cc_6; }

    public function getCc7() { return $this->cc_7; }
    public function setCc7($cc_7) { $this->cc_7 = $cc_7; }

    public function getCc8() { return $this->cc_8; }
    public function setCc8($cc_8) { $this->cc_8 = $cc_8; }

    public function getCc9() { return $this->cc_9; }
    public function setCc9($cc_9) { $this->cc_9 = $cc_9; }

    public function getCc10() { return $this->cc_10; }
    public function setCc10($cc_10) { $this->cc_10 = $cc_10; }

    public function getCc11() { return $this->cc_11; }
    public function setCc11($cc_11) { $this->cc_11 = $cc_11; }

    public function getCc12() { return $this->cc_12; }
    public function setCc12($cc_12) { $this->cc_12 = $cc_12; }

    public function getCc13() { return $this->cc_13; }
    public function setCc13($cc_13) { $this->cc_13 = $cc_13; }

    public function getRc1() { return $this->rc_1; }
    public function setRc1($rc_1) { $this->rc_1 = $rc_1; }

    public function getRc3() { return $this->rc_3; }
    public function setRc3($rc_3) { $this->rc_3 = $rc_3; }

    public function getRc4() { return $this->rc_4; }
    public function setRc4($rc_4) { $this->rc_4 = $rc_4; }

    public function getRc5() { return $this->rc_5; }
    public function setRc5($rc_5) { $this->rc_5 = $rc_5; }

    public function getRc6() { return $this->rc_6; }
    public function setRc6($rc_6) { $this->rc_6 = $rc_6; }

    public function getRc7() { return $this->rc_7; }
    public function setRc7($rc_7) { $this->rc_7 = $rc_7; }

    public function getAg1() { return $this->ag_1; }
    public function setAg1($ag_1) { $this->ag_1 = $ag_1; }

    public function getAg3() { return $this->ag_3; }
    public function setAg3($ag_3) { $this->ag_3 = $ag_3; }

    public function getAg4() { return $this->ag_4; }
    public function setAg4($ag_4) { $this->ag_4 = $ag_4; }

    public function getAg5() { return $this->ag_5; }
    public function setAg5($ag_5) { $this->ag_5 = $ag_5; }

    public function getAg6() { return $this->ag_6; }
    public function setAg6($ag_6) { $this->ag_6 = $ag_6; }

    public function getAg7() { return $this->ag_7; }
    public function setAg7($ag_7) { $this->ag_7 = $ag_7; }

    public function getComentario() { return $this->comentario; }
    public function setComentario($comentario) { $this->comentario = $comentario; }
}
