<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 

Programacao da Atualizacao

Tabela de atualizacao

configuracao.tbatualizacao
    cd_versao integer not null,
    dt_data_atualizacao
    cd_usuario integer not null,->>pegar do usuario logado no sistema
    cd_filial integer not null    ->>
    dt_cad date,
    dt_alt date,
    hr_cad,
    hr_alt
        


Tabela de dados dos sqls executados
configuracao.tbsqlatualizacao
  cd_versao integer not null,
  dt_data_atualizacao date,
  ds_sql_atualizacao character varying
  ds_log_erros
  cd_usuario integer not null,->>pegar do usuario logado no sistema
  cd_filial integer not null    ->>
  dt_cad date,
  dt_alt date,
  hr_cad,
  hr_alt
      

*/
class Atualizacao extends ViewPadrao{

    public function montaFormulario() {
        
    }

    public function montaTitulo() {
        
    }

    public function verificaVersao() {
     
        $iCodigoVersao = 1;//pega da base de dados

        if ($iCodigoVersao == 1){
            //executa o pacote padrao da base de dados
        }else{
          //Se o codigo da versao for igual ao atual,mostra a situacao como atualizado do módulo
            
            //separar por modulos as atualizacoes
            //Nome Modulo   Versao  Situacao
            //Configuracao     1       Desatualizado ou Atualizado
            
            //se tiver atualizado por a cor verde
            //se nao tiver atualizado por a cor vermelho
        }
    }
    
    //Regra de negocios
    //Versao será controlada por pacotes em cada módulo
    
    //dentro de cada pacote terá:
    // numero chamado 
    //script a ser executado
    
    
    //Precisa fazer testes da versão para ver o comportamento
    //dos pacotes de atualizacao
    
    //Precisa ter mais 2 sistemas
    
    //1 Sistema->Sistema de Gerenciamento de chamados
    //ver o sistema do software publico para usar
    //Inicio usar apenas anotacao em texto
    //No sistema de chamados deverá ser linkado os requisitos funcionais e nao funcionais
    //Lista de chamados a serem feitos
    //
    //Chamado 1-Criar módulo configuracao
    //Chamado 2-Criar módulo cadastros
    //Chamado 3-Criar framework de programacao em PHP e JavaScript e CSS com funcoes padrao
    //Parte do SQL,usar como base o livro de PHP OO
    //A cor usar um vermelho fraco quase rosa para o sistema
    //
    //Chamado 3-Criar módulo faturamento
    //Chamado 4-Criar módulo financeiro
    //Chamado 5-Criar módulo caixa
    //Chamado 6-Criar módulo relatorios
    //Chamado 7-Criar ou configurar sistema de chamados-usar modelo do mysuite e software freelancer
    //Chamado 8-Criar ou configurar sistema de gerenciamento de projetos de software
    //2 Sistema
    //Sistema de gerenciamento de projetos freelancer a serem executados
 
    
    //Script padrao da base de dados
    
//    Criação dos esquemas
//CREATE SCHEMA cadastro;
//CREATE SCHEMA compra;
//CREATE SCHEMA configuracao;
//CREATE SCHEMA faturamento;
//CREATE SCHEMA financeiro;
//
//CREATE TABLE cadastro.tbpessoa(
//  cd_pessoa integer NOT NULL,
//  nm_pessoa character varying(400),
//  ds_endereco character varying(400),
//  ds_email character varying(200),
//  nr_telefone character varying(200),
//  cd_cpf character varying(25),
//  ds_bairro character varying(200),
//  ds_estado character varying(2),
//  ds_cidade integer,
//  cd_filial integer NOT NULL,
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//
//CREATE TABLE cadastro.tbproduto
//(
//  cd_produto integer NOT NULL,
//  ds_produto character varying(100) NOT NULL,
//  qt_estoque integer NOT NULL,
//  fg_ativo smallint DEFAULT 1,
//  cd_usuario smallint NOT NULL,
//  cd_filial integer NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//CREATE TABLE compra.tbestoque
//(
//  cd_produto bigint NOT NULL,
//  quantidade numeric(16,4) NOT NULL,
//  cd_filial integer NOT NULL,
//  cd_usuario smallint NOT NULL,
//  dt_cad date NOT NULL,
//  dt_alt date NOT NULL,
//  hr_cad time without time zone NOT NULL,
//  hr_alt time without time zone NOT NULL
//);
//
//CREATE TABLE compra.tbitementrada
//(
//  cd_movimento integer NOT NULL,
//  cd_sequencia smallint NOT NULL,
//  cd_produto bigint NOT NULL,
//  qt_item numeric(16,4) NOT NULL,
//  vl_custo numeric(16,4),
//  vl_venda numeric(16,4),
//  vl_acrescimo numeric(16,4),
//  vl_desconto numeric(16,4),
//  cd_filial smallint NOT NULL,
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//CREATE TABLE compra.tbnotaentrada
//(
//  cd_movimento integer NOT NULL,
//  cd_fornecedor integer,
//  cd_pagamento integer,
//  vl_acrescimo numeric(16,4) NOT NULL DEFAULT 0,
//  vl_desconto numeric(16,4) NOT NULL DEFAULT 0,
//  fg_situacao smallint,
//  cd_filial smallint NOT NULL,
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//
//CREATE TABLE configuracao.tbfilial
//(
//  filcodigo integer NOT NULL,
//  filnome character varying(200) NOT NULL,
//  filendereco character varying(200),
//  filcep character varying(100),
//  filbairro character varying(100),
//  filestado character varying(100) NOT NULL,
//  filmunicipio character varying(100),
//  filcnpj character varying(100),
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL,
//  CONSTRAINT pk_filcodigo PRIMARY KEY (filcodigo)
//);
//
//
//CREATE TABLE configuracao.tbgrupo_usuario
//(
//  cd_grupo integer NOT NULL,
//  ds_grupo character varying(50) NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL,
//  cd_filial integer NOT NULL
//);
//
//CREATE TABLE configuracao.tbusuario
//(
//  cd_usuario smallint NOT NULL,
//  ds_login character varying(200) NOT NULL,
//  ds_usuario character varying(200) NOT NULL,
//  ds_senha character varying(200),
//  cd_grupo integer NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL,
//  cd_filial integer NOT NULL,
//  fg_ativo smallint NOT NULL DEFAULT 1,
//  CONSTRAINT pk_tbusuario PRIMARY KEY (cd_usuario)
//);
//
//CREATE TABLE faturamento.tbfaturamento
//(
//  cd_filial smallint NOT NULL,
//  cd_movimento integer NOT NULL,
//  cd_vendedor integer,
//  cd_pagamento integer,
//  cd_pessoa integer,
//  vl_acrescimo numeric(16,4) NOT NULL DEFAULT 0,
//  vl_desconto numeric(16,4) NOT NULL DEFAULT 0,
//  fg_situacao smallint,
//  cd_parcela_documento integer NOT NULL,
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//CREATE TABLE faturamento.tbitemfaturamento
//(
//  cd_filial smallint NOT NULL,
//  cd_movimento integer NOT NULL,
//  cd_sequencia smallint NOT NULL,
//  cd_produto bigint NOT NULL,
//  quantidade numeric(16,4) NOT NULL,
//  vl_custo numeric(16,4),
//  vl_venda numeric(16,4),
//  vl_desconto numeric(16,4),
//  vl_acrescimo numeric(16,4),
//  fg_situacao smallint,
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//CREATE TABLE financeiro.tbcondicaopagamento
//(
//  cd_condicao integer NOT NULL,
//  ds_condicao character varying(50) NOT NULL,
//  nr_dias_parcela smallint NOT NULL,
//  fg_ativo smallint NOT NULL,
//  cd_filial smallint NOT NULL,
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//CREATE TABLE financeiro.tbparcela
//(
//  cd_filial smallint NOT NULL,
//  cd_movimento integer NOT NULL,
//  cd_documento integer NOT NULL,
//  cd_parcela integer NOT NULL,
//  cd_pessoa integer NOT NULL,
//  fg_paga_recebe smallint NOT NULL,
//  fg_situacao integer NOT NULL,
//  vl_parcela numeric(16,4),
//  vl_juros numeric(16,4),
//  cd_condicao_pagamento integer NOT NULL,
//  vl_acrescimo numeric(16,4),
//  vl_desconto numeric(16,4),
//  dt_vencto_par date NOT NULL,
//  cd_tipo_cobranca numeric(3,0),
//  dt_pag_par date,
//  vl_pago numeric(16,4),
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
//CREATE TABLE financeiro.tbcondicaopagamento
//(
//  cd_condicaopagamento integer NOT NULL,
//  ds_condicaopagamento character varying(200) NOT NULL,
//  cd_quantidadeparcela integer NOT NULL,
//  cd_quantidadedias integer NOT NULL,
//  fg_ativo smallint NOT NULL,
//  cd_filial smallint NOT NULL,
//  cd_usuario smallint NOT NULL,
//  dt_alt date NOT NULL,
//  hr_alt time without time zone NOT NULL,
//  dt_cad date NOT NULL,
//  hr_cad time without time zone NOT NULL
//);
//
///******************************************************************************/
///*                                primary keys                                */
///******************************************************************************/
//
//alter table cond_pag add constraint pk_cond_pag primary key (cd_cond);
//alter table cor add constraint pk_cor primary key (cd_cor);
//alter table cst_ipi add constraint pk_cst_ipi primary key (cd_cst_ipi);
//alter table cst_pis_cofins add constraint pk_cst_pis_cofins primary key (cd_cst_pis_cofins);
//alter table doc_fatura add constraint pk_doc_fatura primary key (cd_filial, cd_movimento);
//alter table doc_receber add constraint pk_doc_receber primary key (cd_filial, cd_documento);
//alter table estado add constraint pk_estado primary key (cd_estado);
//alter table estoque add constraint pk_estoque primary key (cd_filial, cd_ref);
//alter table filial add constraint pk_filial primary key (cd_filial);
//alter table grupo add constraint pk_grupo primary key (cd_grupo);
//alter table grupo_usuario add constraint pk_grupo_usuario primary key (cd_grupo);
//alter table itens_entrada add constraint pk_itens_entrada primary key (cd_filial, cd_movimento, cd_seq_ite_pro);
//alter table itens_orc add constraint pk_itens_orc primary key (cd_filial, cd_movimento, cd_seq_ite_pro);
//alter table marca add constraint pk_marca primary key (cd_marca);
//alter table markup add constraint pk_markup primary key (cd_grupo_fiscal, cd_estado);
//alter table municipio add constraint pk_municipio primary key (cd_estado, cd_municipio);
//alter table ncmsh add constraint pk_ncmsh primary key (cd_codigo);
//alter table notaentrada add constraint pk_notaentrada primary key (cd_filial, cd_movimento);
//alter table orcamento add constraint pk_orcamento primary key (cd_filial, cd_movimento);
//alter table pais add constraint pk_pais primary key (cd_pais);
//alter table parcelas add constraint pk_parcelas primary key (cd_filial, cd_movimento, sequencia_parcela);
//alter table parc_doc add constraint pk_parc_doc primary key (cd_filial, cd_movimento, sq_ite_par);
//alter table parc_entrada add constraint pk_parc_entrada primary key (cd_filial, cd_movimento, sq_ite_par);
//alter table parc_orc add constraint pk_parc_orc primary key (cd_filial, cd_movimento, sq_ite_par);
//alter table pessoa add constraint pk_pessoa primary key (cd_pessoa);
//alter table produto add constraint pk_produto primary key (cd_ref)
//alter table produto add constraint pk_produto primary key (cd_prod);
//alter table situacao_tributaria add constraint pk_situacao_tributaria primary key (cd_situacao_tributaria);
//alter table sub_cond_pag add constraint pk_sub_cond_pag primary key (cd_condicao, cd_parcela);
//alter table sub_doc_receber add constraint pk_sub_doc_receber primary key (cd_filial, cd_documento, nr_parc_doc);
//alter table sub_grupo add constraint pk_sub_grupo primary key (cd_grupo, cd_sub_grupo);
//alter table sub_tab_preco add constraint pk_sub_tab_preco primary key (cd_ref);
//alter table teste_date add constraint pk_teste_date primary key (cd_pessoa);
//alter table tipo_cobranca add constraint pk_tipo_cobranca primary key (cd_cobranca);
//alter table tipo_nota add constraint pk_tipo_nota primary key (cd_tipo);
//alter table tipo_nota_fiscal add constraint pk_tipo_nota_fiscal primary key (cd_tipo, cd_gp_fiscal, tp_consumo);
//alter table unidade_medida add constraint pk_unidade_medida primary key (cd_unidade);
//alter table usuario add constraint pk_usuario primary key (cd_usuario);
//
//
///******************************************************************************/
///*                                foreign keys                                */
///******************************************************************************/
//
//alter table doc_receber add constraint fk_doc_receber_cd_cond_pagto foreign key (cd_pagto) references cond_pag (cd_cond) on update cascade;
//alter table doc_receber add constraint fk_doc_receber_pessoa foreign key (cd_pessoa) references pessoa (cd_pessoa) on update cascade;
//alter table estoque add constraint fk_estoque_1 foreign key (cd_ref) references produto (cd_ref) on update cascade;
//alter table filial add constraint fk_filial_estado foreign key (cd_uf_fil) references estado (cd_estado) on delete no action on update cascade;
//alter table itens_orc add constraint fk_itens_orc_cd_ref foreign key (cd_refer_pro) references produto (cd_ref) on update cascade;
//alter table municipio add constraint fk_municipio_estado foreign key (cd_estado) references estado (cd_estado) on delete no action on update cascade;
//alter table parcelas add constraint fk_parcelas_doc_f foreign key (cd_filial, cd_movimento) references orcamento (cd_filial, cd_movimento) on delete cascade on update cascade;
//alter table parcelas add constraint fk_parcelas_tipo_cobranca foreign key (cd_tipo_cobranca) references tipo_cobranca (cd_cobranca) on delete no action on update cascade;
//alter table parc_doc add constraint fk_parc_doc_doc_f foreign key (cd_filial, cd_movimento) references doc_fatura (cd_filial, cd_movimento) on delete cascade on update cascade;
//alter table parc_doc add constraint fk_parc_doc_tipo_cobranca foreign key (cd_tipo_cob_par) references tipo_cobranca (cd_cobranca) on delete no action on update cascade;
//alter table parc_entrada add constraint fk_parc_entrada_doc foreign key (cd_filial, cd_movimento) references doc_fatura (cd_filial, cd_movimento) on delete cascade on update cascade;
//alter table parc_entrada add constraint fk_parc_entrada_tipo_cobranca foreign key (cd_tipo_cob_par) references tipo_cobranca (cd_cobranca) on delete no action on update cascade;
//alter table parc_orc add constraint fk_parc_orc_doc foreign key (cd_filial, cd_movimento) references doc_fatura (cd_filial, cd_movimento) on delete cascade on update cascade;
//alter table parc_orc add constraint fk_parc_orc_tipo_cobranca foreign key (cd_tipo_cob_par) references tipo_cobranca (cd_cobranca) on delete no action on update cascade;
//alter table sub_cond_pag add constraint fk_sub_cond_pag_cond_pag foreign key (cd_condicao) references cond_pag (cd_cond) on delete no action on update cascade;
//alter table sub_cond_pag add constraint fk_sub_cond_pag_tip_cobranc foreign key (cd_cobranca) references tipo_cobranca (cd_cobranca) on delete no action on update cascade;
//alter table sub_doc_receber add constraint fk_sub_doc_receber_doc foreign key (cd_filial, cd_documento) references doc_receber (cd_filial, cd_documento) on delete cascade on update cascade;
//alter table sub_grupo add constraint fk_sub_grupo_grupo foreign key (cd_grupo) references grupo (cd_grupo) on update cascade;

}








