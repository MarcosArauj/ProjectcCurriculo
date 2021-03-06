<?php


namespace Source\Models;

/**
 * Class PersonalData
 * @package Source\Models
 */
class PersonalData extends Model {

    /**
     * @return bool
     * @throws \Exception
     * Salvar cadastro de Dados Pessoais
     */
    public function savePersonalData():bool {

        $results = $this->conn->select(
            "CALL sp_dados_pessoais_salvar(:primeiro_nome,:sobrenome,:nome_social,:nome_social_uso,:genero,:cor_raca,:nascimento,
           :naturalidade,:uf_naturalidade,:nacionalidade,:id_usuario)", array(
            ":primeiro_nome" => $this->getprimeiro_nome(),
            ":sobrenome" => $this->getsobrenome(),
            ":nome_social" =>$this->getnome_social(),
            ":nome_social_uso"=>$this->getnome_social_uso(),
            ":genero" => $this->getgenero(),
            ":cor_raca" => $this->getcor_raca(),
            ":nascimento" => $this->getnascimento(),
            ":naturalidade" => $this->getnaturalidade(),
            ":uf_naturalidade" => $this->getuf_naturalidade(),
            ":nacionalidade" => $this->getnacionalidade(),
            ":id_usuario" => $this->getid_usuario()

        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salvar Cadastro!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }


    /**
     * @return bool
     * @throws \Exception
     * Atualizar cadastro de Dados Pessoais
     */
    public function updatePersonalData():bool {

        $results = $this->conn->select(
            "CALL sp_dados_pessoais_atualizar(:id_pessoa,:primeiro_nome,:sobrenome,:nome_social,:nome_social_uso,:genero,:cor_raca,:nascimento,
           :naturalidade,:uf_naturalidade,:nacionalidade)", array(
            ":id_pessoa"=>$this->getid_pessoa(),
            ":primeiro_nome" => $this->getprimeiro_nome(),
            ":sobrenome" => $this->getsobrenome(),
            ":nome_social" =>$this->getnome_social(),
            ":nome_social_uso"=>$this->getnome_social_uso(),
            ":genero" => $this->getgenero(),
            ":cor_raca" => $this->getcor_raca(),
            ":nascimento" => $this->getnascimento(),
            ":naturalidade" => $this->getnaturalidade(),
            ":uf_naturalidade" => $this->getuf_naturalidade(),
            ":nacionalidade" => $this->getnacionalidade()

        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Atualizar Cadastro!" );
            return false;
        }

        $this->setData($results[0]);

        return true;

    }


    /**
     * @return bool
     * @throws \Exception
     * Salva e Atualizar Cadastro de Deficiência
     */
    public function saveDeficiency(): bool {

        $results = $this->conn->select("CALL sp_deficiencia_salvar(:id_deficiencia,:deficiencia_existe,:tipo_deficiencia,:cid,:especificacao_deficiencia,:regime_cota, :veiculo_adaptado, 
        :transporte,:acompanhantes,:adaptacoes_trabalho,:especificacao_trabalho,:id_usuario)", array(
            ":id_deficiencia"=>$this->getid_deficiencia(),
            ":deficiencia_existe"=>$this->getdeficiencia_existe(),
            ":tipo_deficiencia"=>$this->gettipo_deficiencia(),
            ":cid"=>$this->getcid(),
            ":especificacao_deficiencia"=>$this->getespecificacao_deficiencia(),
            ":regime_cota"=>$this->getregime_cota(),
            ":veiculo_adaptado"=>$this->getveiculo_adaptado(),
            ":transporte"=>$this->gettransporte(),
            ":acompanhantes"=>$this->getacompanhantes(),
            ":adaptacoes_trabalho"=>$this->getadaptacoes_trabalho(),
            ":especificacao_trabalho"=>$this->getespecificacao_trabalho(),
            ":id_usuario"=>$this->getid_usuario()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Registrar de Deficiência!".$this->getid_usuario());
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    public function deleteCurriculum():void{

        $this->conn->query("CALL sp_usuario_excluir(:id_usuario)"
            ,array(
                ":id_usuario"=>$this->getid_usuario()
            ));

    }


}