<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="form-group col-md-12">
    <b>Encontrou o idioma ?</b> <br>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="sim_idioma" class="custom-control-input">
        <label class="custom-control-label" for="sim_idioma">Sim</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="nao_idioma"  class="custom-control-input">
        <label class="custom-control-label" for="nao_idioma">Não</label>
    </div>
</div>
<div class="form-group col-md-8" id="novo_idioma">
    <label for="idioma_pt"><b>Digite o Idioma: </b></label>
    <input type="text" class="form-control form-control-sm" id="idioma_pt" name="idioma" placeholder="Ex:Idioma" >
</div>