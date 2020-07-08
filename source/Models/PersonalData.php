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
            "CALL sp_dados_pessoais_salvar(:primeiro_nome,:sobrenome,:nome_social,:genero,:cor_raca,:nascimento,:naturalidade,:uf_naturalidade,
            :nacionalidade,:rg,:cpf,:id_usuario)", array(
            ":primeiro_nome" => $this->getprimeiro_nome(),
            ":sobrenome" => $this->getsobrenome(),
            ":nome_social" =>$this->getnome_social(),
            ":genero" => $this->getgenero(),
            ":cor_raca" => $this->getcor_raca(),
            ":nascimento" => $this->getnascimento(),
            ":naturalidade" => $this->getnaturalidade(),
            ":uf_naturalidade" => $this->getuf_naturalidade(),
            ":nacionalidade" => $this->getnacionalidade(),
            ":rg" => $this->getrg(),
            ":cpf" => $this->getcpf(),
            ":id_usuario" => $this->getid_usuario()

        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salver Cadastro!" );
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
                ":cpf"=>$cpf
            ]);
        if(count($results) > 0){
            return true;
        }
        return false;
    }

}