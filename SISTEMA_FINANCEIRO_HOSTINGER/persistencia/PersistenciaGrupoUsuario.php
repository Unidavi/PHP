<?php

class PersistenciaGrupoUsuario extends PersistenciaPadrao {

    /** @var ModelGrupoUsuario */
    protected $Model;

    public function insere() {
        $sSql = "INSERT INTO configuracao.tbgrupo_usuario(cd_grupo_usuario,ds_grupo,dt_alt,hr_alt,dt_cad,hr_cad,cd_filial) values("
                . " " . $this->Model->getCodigo() . ","
                . "'" . $this->Model->getDs_grupo() . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "" . $this->Model->getModelFilial() . ""
                . " )";
        $this->getQuery()->query($sSql);
    }

    public function altera() {
        $sSql = "UPDATE configuracao.tbgrupo_usuario SET "
                . "ds_grupo=       " . "'" . $this->Model->getDs_grupo() . "',"
                . "dt_alt=         " . "'" . "01/01/2016" . "',"
                . "hr_alt=         " . "'" . "08:00:23" . "',"
                . "cd_filial=      " . " " . $this->Model->getModelFilial() . ""
                . " WHERE cd_grupo_usuario=" . $this->Model->getCd_grupo();
        $this->getQuery()->query($sSql);
    }

    public function exclui() {
        $sSql = "DELETE FROM configuracao.tbgrupo_usuario WHERE cd_grupo_usuario = " . $this->Model->getCd_grupo();
        $this->getQuery()->query($sSql);
    }

    public function get() {
        $aGruposUsuarios = Array();
        $sSql = "SELECT "
                . "    configuracao.tbgrupo_usuario.*,"
                . "    configuracao.tbfilial.* "
                . " FROM                           "
                . "    configuracao.tbgrupo_usuario"
                . " INNER JOIN configuracao.tbfilial ON"
                . "    configuracao.tbgrupo_usuario.cd_filial=configuracao.tbfilial.filcodigo"
                . " WHERE configuracao.tbgrupo_usuario.cd_grupo_usuario=" . $this->Model->getCd_grupo();
        $aGrupoUsuarioBanco = $this->getQuery()->selectall($sSql);

        foreach ($aGrupoUsuarioBanco as $aValor) {
            $oModelGrupoUsuario = $this->getModelFromDb($aValor);
            $aGruposUsuarios [] = $oModelGrupoUsuario;
        }
        return $aGruposUsuarios;
    }

    public function getAll() {
        $aGruposUsuarios = Array();
        $sSql = "SELECT "
                . "    configuracao.tbgrupo_usuario.*,"
                . "    configuracao.tbfilial.* "
                . " FROM                           "
                . "    configuracao.tbgrupo_usuario"
                . " INNER JOIN configuracao.tbfilial ON"
                . "    configuracao.tbgrupo_usuario.cd_filial=configuracao.tbfilial.filcodigo order by 1";

        $aGrupoUsuarioBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aGrupoUsuarioBanco as $aValor) {
            $oModelGrupoUsuario = $this->getModelFromDb($aValor);
            $aGruposUsuarios [] = $oModelGrupoUsuario;
        }
        return $aGruposUsuarios;
    }

    public function getModelFromDb($aValor) {
        $oModeloGrupoUsuario = new ModelGrupoUsuario();
        $oModeloGrupoUsuario->setCodigo($aValor['cd_grupo_usuario']);
        $oModeloGrupoUsuario->setDs_grupo($aValor['ds_grupo']);

        $oModelFilial = new ModelFilial();
        $oModelFilial->setFilcodigo($aValor['filcodigo']);
        $oModelFilial->setFilnome($aValor['filnome']);
        $oModeloGrupoUsuario->setModelFilial($oModelFilial);

        return $oModeloGrupoUsuario;
    }

}
