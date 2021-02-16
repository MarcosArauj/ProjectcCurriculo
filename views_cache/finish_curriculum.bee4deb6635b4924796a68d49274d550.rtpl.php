<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navbar");?>
<main role="main">
        <div class="dashboard-text">
             <div class="container col-md-8">
                 <span  class="alert_message"> <?php echo flash(); ?></span>
                <h2><?php echo site("desc"); ?></h2>
                 <h4>Finalize seu Curriculo!</h4>
                 <br>
                <form class="form" action="/curriculum/curriculum/create" method="post" autocomplete="off">
                    <div class="custom-control custom-switch" style="color: black">
                        <input type="checkbox" class="custom-control-input" name="divulgacao" id="divulgacao" value="Não" >
                        <label class="custom-control-label" for="divulgacao"><b>Autoriza a divulgação do seus dados, para fins de contratação?
                            <br><a href="https://www.gov.br/defesa/pt-br/acesso-a-informacao/lei-geral-de-protecao-de-dados-pessoais-lgpd" target="_blank">
                                Lei LGPD(Lei Geral de Proteção de Dados)</a>
                        </b></label>
                    </div>
                    <br>
                    <p>
                    <a class="btn btn-danger begin" href="/user/professional_experience/create" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                    <button class="btn btn-success begin"><i class="fa fa-check" aria-hidden="true"></i>  Finalizar</button></p>&nbsp;
                </form>
            </div>
        </div>
</main>
<?php require $this->checkTemplate("footer");?>