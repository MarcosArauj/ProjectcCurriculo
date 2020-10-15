<?php if(!class_exists('Rain\Tpl')){exit;}?><form action="/search/curriculum">
<div class="input-group">
    <select class="form-control custom-select search" name="search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <option value="">Selecione a Formação Acadêmica</option>
        <option value="Fundamental 1(1º a 5º ano)">Fundamental 1(1º a 5º ano)</option>
        <option value="Fundamental 2(6º a 9º ano)">Fundamental 2(6º a 9º ano)</option>
        <option value="Médio">Médio</option>
        <option value="Superior">Superior</option>
        <option value="Pós-Graduação">Pós-Graduação</option>
        <option value="Mestrado">Mestrado</option>
        <option value="Doutorado">Doutorado</option>
        <option value="Pós-Doutorado">Pós-Doutorado</option>
    </select>
    <input type="hidden" name="filter" value="Formação">
    <div class="input-group-append">
        <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</div>
</form>