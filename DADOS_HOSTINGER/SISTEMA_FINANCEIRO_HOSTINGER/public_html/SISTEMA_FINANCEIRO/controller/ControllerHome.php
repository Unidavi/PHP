<?php

class ControllerHome extends ControllerPadrao {

    public function processa() {
        $this->MontaTela();
    }

    public function MontaTela() {
        $oViewHome = new ViewHome();
        $oViewHome->montaTela();
    }

}
