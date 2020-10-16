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
<form action="/search/curriculum" >
    <div class="row">
        <div class="form-group col-md-4">
            <select class="form-control custom-select search" id="filtro" name="filter">
                <option value="">Selecione um filtro</option>
                <option value="Conhecimento">Area de Conhecimento</option>
                <option value="Formação">Formação Acadêmica</option>
                <option value="Idioma">Idioma</option>
                <option value="Sexo">Sexo</option>
                <option value="PCD">PCD</option>
            </select>
        </div>
        <div class="form-group col-md-8">
            <div class="input-group">
                <input type="text" class="form-control search" name="search" id="busca" placeholder="Digite sua busca" disabled >
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
<section class="container col-md-6">
    <?php require $this->checkTemplate("results_search");?>
</section>
</main>
<?php require $this->checkTemplate("footer");?>