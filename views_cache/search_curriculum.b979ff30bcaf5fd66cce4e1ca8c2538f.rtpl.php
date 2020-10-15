<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navebar_register");?>

<main role="main">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4"> Buscar Curriculos </h4>
    </div>
<section class="container col-md-6">
<div class="alert_message">
    <?php echo flash(); ?>
</div>
    <div class="row">
    <div class="form-group col-md-8">
            <div id="formacao">
                <?php require $this->checkTemplate("search_formation");?>
            </div>
            <div id="sexo">
                <?php require $this->checkTemplate("search_gen");?>
            </div>
            <div id="deficiencia">
                <?php require $this->checkTemplate("search_deficiency");?>
            </div>
            <div id="conhecimento">
                <?php require $this->checkTemplate("search_knowledge");?>
            </div>
            <div id="idiomas">
                <?php require $this->checkTemplate("search_languages");?>
            </div>
            <div id="selecao">
                <div  style="color: #0062cc">
                    <h4 class="text-center"><b>Selecione um filtro para a busca</b></h4>
                </div>
            </div>

    </div>
    <div class="form-group col-md-4">
        <select class="form-control custom-select search" id="filtro">
            <option value="">Selecione</option>
            <option value="Conhecimento">Area de Conhecimento</option>
            <option value="Formação">Formação Acadêmica</option>
            <option value="Idioma">Idioma</option>
            <option value="Sexo">Sexo</option>
            <option value="PCD">PCD</option>
        </select>
    </div>
    </div>
</section>
<section class="container col-md-6">
    <?php require $this->checkTemplate("results_search");?>
</section>
</main>
<?php require $this->checkTemplate("footer");?>