<?php

class PersistenciaHome extends PersistenciaPadrao {

    /** @var ModelHome */
    protected $Model;

    public function insere() {
        $sSql = "INSERT INTO configuracao.tbfilial(filcodigo,filnome,filendereco,filcep,filbairro,filestado,filmunicipio,filcnpj,dt_alt,hr_alt,dt_cad,hr_cad) values("
                . " " . $this->Model->getFilcodigo() . ","
                . "'" . $this->Model->getFilnome() . "',"
                . "'" . $this->Model->getFilendereco() . "',"
                . "'" . $this->Model->getFilcep() . "',"
                . "'" . $this->Model->getFilbairro() . "',"
                . "'" . $this->Model->getFilestado() . "',"
                . "'" . $this->Model->getFilmunicipio() . "',"
                . "'" . $this->Model->getFilcnpj() . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "'"
                . " )";
        $this->getQuery()->query($sSql);
    }

    public function altera() {
        $sSql = "UPDATE configuracao.tbfilial SET "
                . "filnome=     " . "'" . $this->Model->getFilnome() . "',"
                . "filendereco= " . "'" . $this->Model->getFilendereco() . "',"
                . "filcep=      " . "'" . $this->Model->getFilcep() . "',"
                . "filbairro=   " . "'" . $this->Model->getFilbairro() . "',"
                . "filestado=   " . "'" . $this->Model->getFilestado() . "',"
                . "filmunicipio=" . "'" . $this->Model->getFilmunicipio() . "',"
                . "filcnpj=     " . "'" . $this->Model->getFilcnpj() . "',"
                . "dt_alt=      " . "'" . "01/01/2016" . "',"
                . "hr_alt=      " . "'" . "08:00:23" . "'"
                . " WHERE filcodigo=" . $this->Model->getFilcodigo();
        $this->getQuery()->query($sSql);
    }

    public function exclui() {
        $sSql = "DELETE FROM configuracao.tbfilial WHERE filcodigo = " . $this->Model->getFilcodigo();
        $this->getQuery()->query($sSql);
    }

    public function get() {
        $aFiliais = Array();
        $sSql = "SELECT * FROM configuracao.tbfilial WHERE filcodigo = " . $this->Model->getFilcodigo();
        $aFilialBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aFilialBanco as $aValor) {
            $oModelFilial = $this->getModelFromDb($aValor);
            $aFiliais [] = $oModelFilial;
        }
        return $aFiliais;
    }

    public function getAll() {
        $aFiliais = Array();
        $sSql = "SELECT * FROM configuracao.tbfilial order by 1";

        $aFilialBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aFilialBanco as $aValor) {
            $oModelFilial = $this->getModelFromDb($aValor);
            $aFiliais [] = $oModelFilial;
        }
        return $aFiliais;
    }

    public function getModelFromDb($aValor) {
        $oModeloFilial = new ModelFilial();
        $oModeloFilial->setFilcodigo($aValor['filcodigo']);
        $oModeloFilial->setFilnome($aValor['filnome']);
        $oModeloFilial->setFilendereco($aValor['filendereco']);
        $oModeloFilial->setFilcep($aValor['filcep']);
        $oModeloFilial->setFilbairro($aValor['filbairro']);
        $oModeloFilial->setFilestado($aValor['filestado']);
        $oModeloFilial->setFilmunicipio($aValor['filmunicipio']);
        $oModeloFilial->setFilcnpj($aValor['filcnpj']);
        $this->setModel($oModeloFilial);

        return $oModeloFilial;
    }

}
