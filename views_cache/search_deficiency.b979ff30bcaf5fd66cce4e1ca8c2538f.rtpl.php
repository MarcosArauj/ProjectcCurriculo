<?php if(!class_exists('Rain\Tpl')){exit;}?><form action="/search/curriculum">
<div class="input-group">
    <select class="form-control custom-select search" name="search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <option value="">Selecione o Tipo de Deficiência</option>
        <option value="">Selecione</option>
        <option value="Auditiva">Auditiva</option>
        <option value="Fisica">Fisica</option>
        <option value="Mental">Mental</option>
        <option value="Multipla">Multipla</option>
        <option value="Visual">Visual</option>
        <option value="Outros">Outros</option>
    </select>
    <input type="hidden" name="filter" value="PCD">
    <div class="input-group-append">
        <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</div>
</form>