<?php


namespace Source\Models;


use Source\Config\Conection;

/**
 * Class PersonalData
 * @package Source\Models
 */
class PersonalData extends User {


    /**
     * @return bool
     * @throws \Exception
     * Salvar cadastro de Dados Pessoais
     */
    public function savePersonalData():bool {

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_dados_pessoais_salvar(:primeiro_nome,:sobrenome,:nome_social,:nome_social_uso,:genero,:cor_raca,:nascimento,
           :naturalidade,:uf_naturalidade,:nacionalidade,:rg,:cpf,:id_usuario)", array(
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
            ":rg" => $this->getrg(),
            ":cpf" => removeMaskCpf($this->getcpf()),
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

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_dados_pessoais_atualizar(:id_pessoa,:primeiro_nome,:sobrenome,:nome_social,:nome_social_uso,:genero,:cor_raca,:nascimento,
           :naturalidade,:uf_naturalidade,:nacionalidade,:rg,:cpf)", array(
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
            ":nacionalidade" => $this->getnacionalidade(),
            ":rg" => $this->getrg(),
            ":cpf" => removeMaskCpf($this->getcpf())


        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Atualizar Cadastro!" . $this->getid_pessoa());
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     * @param string $cpf
     * @return bool
     * Checar CPF já cadastrado
     */
    public static function checkCpf(string $cpf):bool {

        $conn = new Conection();

        $results = $conn->select("SELECT cpf FROM v_usuario WHERE cpf = :cpf",
            [
                ":cpf"=> removeMaskCpf($cpf)
            ]);
        if(count($results) > 0){
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Exception
     * Salvar Contato no sistema
     */
    public function saveContact():bool {

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_contato_salvar(:celular,:telefone,:c_email,:endereco,:numero,:bairro,:cep,:cidade,:estado,:pais,:id_usuario)",
            array(
                ":celular" => $this->getcelular(),
                ":telefone" => $this->gettelefone(),
                ":c_email" => $this->getc_email(),
                ":endereco" => $this->getendereco(),
                ":numero" => $this->getnumero(),
                ":bairro" => $this->getbairro(),
                ":cep" => $this->getcep(),
                ":cidade" => $this->getcidade(),
                ":estado" => $this->getestado(),
                ":pais" => $this->getpais(),
                ":id_usuario" => $this->getid_usuario()
            ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salver Contato!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     * @return array
     */
    public static function listcountries(): array {
        $conn = new Conection();

        return $conn->select(" SELECT * FROM tb_paises");

    }

    /**
     * @return bool
     * @throws \Exception
     * Salva Cadastro de Deficiência
     */
    public function saveDeficiency(): bool {

        $conn = new Conection();

        $results = $conn->select("CALL sp_deficiencia_salvar(:id_deficiencia,:tipo_deficiencia,:cid,:especificacao_deficiencia,:regime_cota, :veiculo_adaptado, 
        :transporte,:acompanhantes,:adaptacoes_trabalho,:especificacao_trabalho,:id_usuario)", array(
            ":id_deficiencia"=>$this->getid_deficiencia(),
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
            throw new \Exception("Erro ao Salvar Cadastro de Deficiência!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }


}